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
    // 1 : lấy url thông qua đường dẫn
    const Url = GetUrl(request.url);
    // 2 : Chuẩn bị thông tin cần gửi
    let information = {
        // 2.1 : phương thức truyền 
        method: "POST",
        // 2.2 : Tiêu dề cần gửi
        headers: {
            // 2.2.1 : 
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            // 2.2.2 : Chỉ chấp nhận server gửi về là 1 json
             'Accept': 'application/json' 
        },
        // 2.3 : Cho phép truy cập dữ liệu cookies
        credentials: "include"
    };
    // 2.4 : Dữ liệu cần gửi đi
    if(Data instanceof FormData){
       information.body = Data;
    } else {
        
        information.headers['Content-Type'] = 'application/json';
        information.body = JSON.stringify(Data || {});
    }
    try {
        // 3. Tiến hành gửi lên server
        const response = await fetch(Url, information);
        const result = await response.json();
        // 3.1 : Trả về lỗi validation
        if(!response.ok){
            if(!response.ok){
                  return {
                    status: false,
                    errors: result.errors || {},
                    from : "VALIDATION"
                }
            }

        }
        // 3.2 : Trả về kết quả mong đợi
        return result;
    } catch(error) {
        // Trả về lỗi nếu như không gửi được
        return {
            status: false,
            message: "Lỗi khi truyền dữ liệu lên server!",
            from : "DATABASE"
        }
    }
}
