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
window.ThemDanhMuc = async function() {
    const categoryName = document.querySelector('#new_category_name').value.trim();
    if (!categoryName) {
        alert("Vui lòng nhập tên danh mục");
        return;
    }
    const DuLieu = { dulieu: categoryName };
    const yeucau = { 
        DiaChi: 1,
    

     };
    const ketqua = await API.CallAPI(DuLieu, yeucau);
    if(ketqua.status){
        HienThiDanhMuc();
        alert(ketqua.message)
    }else{
         alert(ketqua.message)
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

window.ThemSanPham = async function() {
    const TenSP = document.getElementById('product_name').value.trim();
    const GiaSP = document.getElementById('list_price').value.trim();
    const HinhAnh = document.getElementById('product_image').files[0];
    const DanhMuc = document.getElementById('category_id_select').value;
    const SoLuong = document.getElementById('quantity').value;
    const Gia_KM = document.getElementById('sale_price').value;
    if(TenSP=="" || GiaSP<=0 || DanhMuc=="" || SoLuong<=0){
        alert("Vui lòng nhập dữ liệu");
        return;
    }
    const formData = new FormData();
    formData.append('ten', TenSP);
    formData.append('gia', GiaSP);
    formData.append('dm', DanhMuc);
    formData.append('sl', SoLuong);
    formData.append('km', Gia_KM || 0);
    if(HinhAnh){
        formData.append('hinh', HinhAnh); 
    }
    const yeucau = { 
        DiaChi: 3,
     };
    const ketqua = await API.CallAPI(formData, yeucau);
    if(ketqua.status){
        alert(ketqua.message);
    } else {
        alert(ketqua.message);
    }
}
window.xoa=async function(id) {
    if(window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')){
        const formData = new FormData();
        formData.append('id', id);
        const yeucau = { 
            DiaChi: 4,
         };
        const ketqua=await API.CallAPI(formData,yeucau);
        if(ketqua.status){
            alert(ketqua.message);
        }else{
            alert(ketqua.message);
        }
    }
}
