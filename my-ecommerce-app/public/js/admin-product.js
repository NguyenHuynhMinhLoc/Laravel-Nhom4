import * as API from './API.js';
const form = document.querySelector('form[role="form"]');
form.addEventListener('submit', function(e){
    e.preventDefault();
});
async function GetCategory(){
    const request={
        url:2,
    };
    const result= await API.CallAPI(undefined,request);
    return result;
}
async function CategoryDisplay(){
    const select = document.getElementById('category_id_select');
    const ObjAPI = await GetCategory();
    select.innerHTML = '';
    Object.values(ObjAPI).forEach((dm,index) => {
       const selected = (index ===ObjAPI.length - 1) ? 'selected' : '';
       select.innerHTML += `<option value="${dm.CategoryID}" ${selected}>${dm.CategoryName}</option>`;
});
}
CategoryDisplay();

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
        CategoryDisplay();
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
    const formData = new FormData();
formData.append('ProductName', ProductName);
formData.append('ProductPrice', ProductPrice);
formData.append('PriceCoubon', promotion || 0);
formData.append('ProductStatus', 1); // mặc định hiển thị
formData.append('CategoryID', Category);
if (Image) formData.append('Image', Image); 
    const request={
        url:3
    };
    const result = await API.CallAPI(formData,request);
    if(result.status){
        alert("Thêm sản phẩm thành công!")
    }else{
       const validation_errors = document.getElementById('validation-errors');
       validation_errors.style.display = 'block';
       validation_errors.innerHTML='';
       let errorHtml = '<strong>Vui lòng kiểm tra lại thông tin:</strong><ul style="margin: 0; padding-left: 20px;">';
       const errorMessagesArrays = Object.values(result.errors);
        errorMessagesArrays.forEach(value => {
           errorHtml += `<li>${value}</li>`;
        });
        errorHtml+="</ul>";
         validation_errors.innerHTML=errorHtml;
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
