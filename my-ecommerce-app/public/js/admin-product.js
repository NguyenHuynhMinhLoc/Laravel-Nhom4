import * as API from './API.js';
const form = document.querySelector('form[role="form"]');
form.addEventListener('submit', function(e){
    e.preventDefault();
});
async function LoadDM(){
    const yeucau={
        DiaChi:2,
    };
    const ketqua= await API.CallAPI(undefined,yeucau);
    return ketqua;
}
async function HienThiDanhMuc(){
    const select = document.getElementById('category_id_select');
    const DuLieuAPI_danhmuc = await LoadDM();
    select.innerHTML = '';
    Object.values(DuLieuAPI_danhmuc).forEach((dm,index) => {
       const selected = (index === DuLieuAPI_danhmuc.length - 1) ? 'selected' : '';
       select.innerHTML += `<option value="${dm.CategoryID}" ${selected}>${dm.CategoryName}</option>`;
});
}
HienThiDanhMuc();

window.categoryADD = async function() {
    const categoryName = document.querySelector('#new_category_name').value.trim();
    if (!categoryName) {
        alert("Vui lòng nhập tên danh mục");
        return;
    }
    const DATA = { DaTa: categoryName };
    const request = { 
        url: 1,
     };
    const result = await API.CallAPI(DATA, request);
    if(result.status){
        HienThiDanhMuc();
        alert(result.message)
    }else{
        alert(result.message)
    }
};
//xử lí ảnh trong trang hiện tại
const input = document.getElementById('product_image');
const preview = document.getElementById('preview_image');
const removeBtn = document.getElementById('remove_image');
input.addEventListener('change', function(event){
    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = 'block';
            removeBtn.style.display = 'inline-block'; 
        }
        reader.readAsDataURL(input.files[0]);
    }
});
removeBtn.addEventListener('click', function(){
    input.value = "";          
    preview.src = "";          
    preview.style.display = 'none';
    removeBtn.style.display = 'none'; 
});

window.ProductADD = async function() {
    const ProductName = document.getElementById('product_name').value.trim();
    const ProductPrice = document.getElementById('list_price').value.trim();
    const Image = document.getElementById('product_image').files[0];
    const Category = document.getElementById('category_id_select').value;
    const Quantity = document.getElementById('quantity').value;
    const promotion = document.getElementById('sale_price').value;
    if(ProductName=="" || ProductPrice<=0 || Category=="" || Quantity<=0){
        alert("Vui lòng nhập dữ liệu");
        return;
    }
    const formData = new FormData();
    formData.append('name', ProductName);
    formData.append('price', ProductPrice);
    formData.append('category', Category);
    formData.append('quantity', SoLuong);
    formData.append('promotion', promotion || 0);
    if(Image){
        formData.append('imge', Image); 
    }
    const request = { 
        url: 3,
     };
    const result = await API.CallAPI(formData, request);
    if(result.status){
        alert(result.message);
    } else {
        alert(result.message);
    }
}

window.ProductDELETE=async function(id) {
    if(window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')){
        const formData = new FormData();
        formData.append('id', id);
        const request = { 
            url: 4,
         };
        const result=await API.CallAPI(formData,request);
        if(result.status){
            alert(result.message);
        }else{
            alert(result.message);
        }
    }
}
