
 //xây dựng hàm lấy dữ liệu đường dẫn 
 function DiaChi(DiaChi){
    switch(DiaChi){
        case 1:
            return '/category/add';
        case 2:
            return '/category/load';
        case 3:
            return '/product/add'
    }
 }
 
export async function CallAPI(dulieu = null, yeucau){
    const DuongDan = DiaChi(yeucau.DiaChi);
    let options = {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        credentials: "include"
    };
    if(dulieu instanceof FormData){
        options.body = dulieu;
    } else {
        options.headers['Content-Type'] = 'application/json';
        options.body = JSON.stringify(dulieu || {});
    }
    try {
        const response = await fetch(DuongDan, options);
        const ketqua = await response.json();
        return ketqua;
    } catch(error) {
        return {
            status: false,
            message: "Lỗi khi truyền dữ liệu lên server!"
        }
    }
}
