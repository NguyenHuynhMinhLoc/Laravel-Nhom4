@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="border-bottom: 2px solid #337ab7; padding-bottom: 10px;">
            <i class="fa fa-cubes fa-fw" style="color: #337ab7;"></i> <strong style="color: #333;">Thêm sản phẩm</strong>
        </h1>
    </div>
</div>

<div class="row" x-data="{ showQuickAdd: false }">
    <div class="col-lg-6">
        <div class="panel panel-info"> 
            <div class="panel-heading" style="background-color: #f7f7f7; color: #333; border-color: #ddd;">
                <i class="fa fa-plus-circle fa-fw"></i> <strong>Nhập thông tin sản phẩm mới</strong>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" enctype="multipart/form-data" id="product-form">
                    @csrf 
                    <div class="form-group">
                        <label for="product_name">Tên sản phẩm <span class="text-danger">(*)</span>:</label>
                        <input class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm..." required>
                    </div>
                    <div class="form-group" id="category-group">
                        <label for="category_id_select">Danh mục <span class="text-danger">(*)</span>:</label>
                        <select class="form-control" name="category_id" id="category_id_select" required></select>
                        <div x-show="!showQuickAdd" id="quick-add-toggle-container" style="margin-top: 10px;">
                            <button type="button" @click="showQuickAdd = true" class="btn btn-default btn-sm" style="border-radius: 4px;">
                                <i class="fa fa-plus fa-fw"></i> Thêm Danh mục mới
                            </button>
                        </div>
                        <div x-show="showQuickAdd" x-cloak id="quick-add-input-container" style="margin-top: 10px;">
                            <div class="input-group">
                                <input type="text" id="new_category_name" class="form-control" placeholder="Nhập tên danh mục mới">
                                <span class="input-group-btn">
                                    <button type="button" id="save-new-category" class="btn btn-success" onclick="categoryADD();">
                                        <i class="fa fa-check fa-fw"></i> Lưu
                                    </button>
                                    <button type="button" @click="showQuickAdd = false" id="cancel-new-category" class="btn btn-danger">
                                        <i class="fa fa-times fa-fw"></i> Hủy
                                    </button>
                                </span>
                            </div>
                            <p id="category-message" class="help-block text-info" style="margin-top: 5px; font-style: italic;">*Tên danh mục mới phải khác tên đã có.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng <span class="text-danger">(*)</span>:</label>
                        <input class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng..." type="number" min="0" required value="0">
                    </div>
                    <div class="form-group">
                        <label for="list_price">Giá niêm yết <span class="text-danger">(*)</span>:</label>
                        <input class="form-control" id="list_price" name="list_price" placeholder="Nhập giá niêm yết..." type="number" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Giá khuyến mãi (Nếu có):</label>
                        <input class="form-control" id="sale_price" name="sale_price" placeholder="Nhập giá khuyến mãi..." type="number" min="0">
                    </div>
                    <div class="form-group">
                        <label for="product_image">Hình ảnh:</label>
                        <input type="file" id="product_image" name="product_image" accept="image/*" onchange="previewImage(event)">
                        <p class="help-block">Chọn một tệp hình ảnh cho sản phẩm.</p>
                        <div id="image-preview-area" style="margin-top: 10px;">
                            <img id="preview_image" src="" alt="Preview" style="display:none; max-width:200px; max-height: 200px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
                            <button type="button" id="remove_image" class="btn btn-xs btn-danger" style="display:none; margin-top:5px; margin-left: 10px;" onclick="clearImage()">
                                <i class="fa fa-times"></i> Xóa ảnh
                            </button>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #ccc;">
                    <button type="button" onclick="ProductADD();" class="btn btn-success btn-lg" style="min-width: 150px; border-radius: 4px;">
                        <i class="fa fa-save fa-fw"></i> Lưu
                    </button>
                    <button type="reset" class="btn btn-warning btn-lg pull-right" style="min-width: 150px; border-radius: 4px;">
                        <i class="fa fa-undo fa-fw"></i> Làm lại
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default"> 
            <div class="panel-heading" style="background-color: #5bc0de; color: white; border-color: #5bc0de;">
                <i class="fa fa-table fa-fw"></i> <strong>Danh sách sản phẩm</strong>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr style="background-color: #d9edf7; color: #31708f;">
                                <th style="width: 50px;">ID</th>
                                <th>Tên sản phẩm</th>
                                <th style="width: 80px;">SL</th>
                                <th style="width: 100px;">Giá</th>
                                <th style="width: 130px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Products as $p)   
                            <tr>
                                <td>{{$p['ProductID']}}</td>
                                <td>{{$p['ProductName']}}</td>
                                <td>{{$p['ProductQuantity']}}</td>
                                <td>{{ number_format($p['ProductPrice'], 0, ',', '.') }} VNĐ</td> {{-- Định dạng tiền tệ --}}
                                <td>
                                    <a href="#" class="btn btn-xs btn-primary" title="Sửa">
                                         <i class="fa fa-eye"></i> Xem
                                    </a>
                                    <a href="#" class="btn btn-xs btn-primary" title="Sửa">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a> 

                                    <button type="button" onclick="ProductDELETE({{ $p['ProductID'] }});" class="btn btn-danger">
                                         Xóa
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                          
                            {{-- Thông báo nếu không có sản phẩm nào --}}
                            @if($SanPham->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Không có sản phẩm nào được tìm thấy.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                 
                    <div class="text-center" style="margin-top: 15px;">
                        <ul class="pagination" style="margin: 0;">
                            {{-- Previous Page Link --}}
                            @if ($SanPham->onFirstPage())
                                <li class="disabled"><span>&laquo; Previous</span></li>
                            @else
                                <li><a href="{{ $SanPham->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
                            @endif
                            @if ($SanPham->hasMorePages())
                                <li><a href="{{ $SanPham->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
                            @else
                                <li class="disabled"><span>Next &raquo;</span></li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
<script type="module" src="{{ asset('js/admin-product.js') }}" defer></script>

@endsection