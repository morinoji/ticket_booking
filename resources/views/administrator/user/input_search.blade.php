<div>
    <div class="text-center">
        <p>Kết quả đang hiển thị:</p>
        <p>{{$users->total()}}</p>

        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="searchButton()">Tìm kiếm</button>
    </div>

    <div class="border-search mt-3">
        <p>Khoảng thời gian trả kết</p>
        <div>
            <label>Từ ngày</label>
            <span>
                    <input name="start" type="date" class="form-control" value="{{request('start')}}">
                </span>

            <label>Đến ngày</label>
            <span>
                    <input name="end" type="date" class="form-control" value="{{request('end')}}">
                </span>

        </div>
    </div>

    <div class="border-search mt-3">
        <p>Tìm theo hồ sơ</p>
        <div>
            <label>Tên hiển thị trên App</label>
            <input name="display_name" type="text" class="form-control" value="{{request('display_name')}}">
        </div>

        <div>
            <label>Số điện thoại</label>
            <input name="phone" type="text" class="form-control" value="{{request('phone')}}">
        </div>

        <div>
            <label>Nơi sống và làm việc</label>
            <input name="address_working" type="text" class="form-control" value="{{request('address_working')}}">
        </div>

{{--        <div>--}}
{{--            <label>Giới tính</label>--}}
{{--            <select name="gender_id" class="form-control select2_init" data-placeholder="Chọn giới tính">--}}
{{--                <option value="">Giới tính</option>--}}
{{--                @foreach(\App\Models\GenderUser::all() as $item)--}}
{{--                    <option value="{{$item->id}}" {{request('gender_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

    </div>
</div>


<script>
    function searchButton(searchParams) {
        if(!searchParams){
            searchParams = new URLSearchParams(window.location.search)
        }

        searchParams.set('display_name', $('input[name="display_name"]').val())
        searchParams.set('phone', $('input[name="phone"]').val())
        searchParams.set('address_born_id', $('select[name="address_born_id"]').val())
        searchParams.set('address_working', $('input[name="address_working"]').val())
        searchParams.set('package_service_id', $('select[name="package_service_id"]').val())
        searchParams.set('gender_id', $('select[name="gender_id"]').val())
        searchParams.set('start', $('input[name="start"]').val())
        searchParams.set('end', $('input[name="end"]').val())
        window.location.search = searchParams.toString()
    }
</script>
