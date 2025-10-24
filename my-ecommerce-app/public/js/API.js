
 //xây dựng hàm lấy dữ liệu đường dẫn 
 function GetUrl(Url){
    switch(Url){
        case 1:
            return '/category/add';
        case 2:
            return '/category/load';
        case 3:
            return '/product/add';
        case 4:
            return '/product/remove';
    }
 }
 
export async function CallAPI(Data = null, request){
    const Url = GetUrl(request.url);
    let information = {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        credentials: "include"
    };
    if(Data instanceof FormData){
       information.body = Data;
    } else {
        information.headers['Content-Type'] = 'application/json';
        information.body = JSON.stringify(Data || {});
    }
    try {
        const response = await fetch(Url,information);
        const result = await response.json();
        return result;
    } catch(error) {
        return {
            status: false,
            message: "Lỗi khi truyền dữ liệu lên server!"
        }
    }
}
