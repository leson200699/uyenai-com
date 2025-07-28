<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    protected $serviceModel;
    
    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }
    
    public function index()
    {
        $services = $this->serviceModel->findAll();
        
        return view('admin/services/index', [
            'title' => 'Quản lý Dịch vụ',
            'services' => $services
        ]);
    }
    
    public function create()
    {
        return view('admin/services/create', [
            'title' => 'Thêm Dịch vụ Mới',
            'types' => $this->serviceModel->getDistinct('type'),
            'categories' => $this->serviceModel->getDistinct('category'),
        ]);
    }
    
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'category' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $features = $this->request->getPost('features');
        
        if (is_array($features)) {
            $features = json_encode($features);
        }
        
        $data = [
            'id' => $this->request->getPost('id') ?: uniqid(),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image' => $this->request->getPost('image'),
            'category' => $this->request->getPost('category'),
            'type' => $this->request->getPost('type'),
            'duration' => $this->request->getPost('duration'),
            'features' => $features,
            'status' => $this->request->getPost('status') ?: 'active'
        ];
        
        $this->serviceModel->insert($data);
        
        return redirect()->to('admin/services')->with('message', 'Dịch vụ đã được thêm thành công.');
    }
    
    public function edit($id = null)
    {
        $service = $this->serviceModel->find($id);
        
        if (!$service) {
            return redirect()->to('admin/services')->with('error', 'Dịch vụ không tồn tại.');
        }
        
        // If features is stored as JSON, decode it
        if (isset($service['features']) && is_string($service['features'])) {
            $service['features'] = json_decode($service['features'], true);
        }
        
        return view('admin/services/edit', [
            'title' => 'Chỉnh sửa Dịch vụ',
            'service' => $service,
            'types' => $this->serviceModel->getDistinct('type'),
            'categories' => $this->serviceModel->getDistinct('category'),
        ]);
    }
    
    public function update($id = null)
    {
        $service = $this->serviceModel->find($id);
        
        if (!$service) {
            return redirect()->to('admin/services')->with('error', 'Dịch vụ không tồn tại.');
        }
        
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'category' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $features = $this->request->getPost('features');
        
        if (is_array($features)) {
            $features = json_encode($features);
        }
        
        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image' => $this->request->getPost('image'),
            'category' => $this->request->getPost('category'),
            'type' => $this->request->getPost('type'),
            'duration' => $this->request->getPost('duration'),
            'features' => $features,
            'status' => $this->request->getPost('status')
        ];
        
        $this->serviceModel->update($id, $data);
        
        return redirect()->to('admin/services')->with('message', 'Dịch vụ đã được cập nhật thành công.');
    }
    
    public function delete($id = null)
    {
        $service = $this->serviceModel->find($id);
        
        if (!$service) {
            return redirect()->to('admin/services')->with('error', 'Dịch vụ không tồn tại.');
        }
        
        try {
            // Kiểm tra xem dịch vụ có đang được sử dụng trong order_items không
            $db = \Config\Database::connect();
            $orderItemsCount = $db->table('order_items')
                ->where('product_id', $id)
                ->where('type', 'service')
                ->countAllResults();
                
            // Kiểm tra xem dịch vụ có trong giỏ hàng không
            $cartCount = $db->table('cart')
                ->where('service_id', $id)
                ->countAllResults();
            
            if ($orderItemsCount > 0) {
                return redirect()->to('admin/services')->with('error', 'Không thể xóa dịch vụ này vì đã có đơn hàng sử dụng nó. Hãy đổi trạng thái thành "inactive" thay vì xóa.');
            }
            
            if ($cartCount > 0) {
                return redirect()->to('admin/services')->with('error', 'Không thể xóa dịch vụ này vì nó đang có trong giỏ hàng của khách hàng. Hãy đổi trạng thái thành "inactive" thay vì xóa.');
            }
            
            // Nếu không có ràng buộc, tiến hành xóa
            $this->serviceModel->delete($id);
            
            return redirect()->to('admin/services')->with('message', 'Dịch vụ đã được xóa thành công.');
        } catch (\Exception $e) {
            log_message('error', 'Lỗi xóa dịch vụ: ' . $e->getMessage());
            return redirect()->to('admin/services')->with('error', 'Không thể xóa dịch vụ này vì nó đang được sử dụng trong hệ thống. Hãy đổi trạng thái thành "inactive" thay vì xóa.');
        }
    }
} 