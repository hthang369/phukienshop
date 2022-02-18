@props([])
<div>
    {!! Form::open(['method' => 'POST', 'role' => 'form', 'class' => 'php-email-form', 'route' => 'page.send-mail']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
            {!! Form::text('fullname', '', ['class' => 'form-control', 'id' => 'fullname', 'placeholder' => __('common.contacts.fullname'), 'data-rule' => 'minlen:4', 'data-msg' => 'Vui lòng nhập ít nhất 4 ký tự', 'required']) !!}
            <div class="validate"></div>
        </div>
        <div class="col-md-6 form-group">
            {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => __('common.contacts.email'), 'data-rule' => 'email', 'data-msg' => 'Vui lòng nhập email hợp lệ', 'required']) !!}
            <div class="validate"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            {!! Form::text('phone', '', ['class' => 'form-control', 'id' => 'phone', 'placeholder' => __('common.contacts.phone'), 'data-rule' => 'minlen:8', 'data-msg' => 'Vui lòng nhập ít nhất 8 ký tự', 'required']) !!}
            <div class="validate"></div>
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('gender_lbl', __('common.contacts.gender').':', ['class' => 'col-form-label mr-3']) !!}
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" value="1" name="gender" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Nam</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" value="0" name="gender" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Nữ</label>
            </div>
            <div class="validate"></div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::text('address', '', ['class' => 'form-control', 'id' => 'address', 'placeholder' => __('common.contacts.address'), 'data-rule' => 'minlen:8', 'data-msg' => 'Vui lòng nhập ít nhất 8 ký tự cho địa chỉ', 'required']) !!}
        <div class="validate"></div>
    </div>
    <div class="form-group">
        {!! Form::text('subject', '', ['class' => 'form-control', 'id' => 'subject', 'placeholder' => __('common.contacts.subject'), 'data-rule' => 'minlen:8', 'data-msg' => 'Vui lòng nhập ít nhất 8 ký tự cho chủ đề liên hệ', 'required']) !!}
        <div class="validate"></div>
    </div>
    <div class="form-group">
        {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => 5, 'placeholder' => __('common.contacts.content'), 'data-rule' => 'required', 'data-msg' => 'Hãy viết một cái gì đó cho chúng tôi', 'required']) !!}
        <div class="validate"></div>
    </div>
    <div class="mb-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
    </div>
    <div class="text-center">
        {!! Form::submit('Send Message', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
