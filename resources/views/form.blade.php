<form class="form-horizontal" action="{{ url('contact') }}" method="POST">
    {{ csrf_field() }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label class="col-sm-3 control-label">Full Name:</label>

        <div class="col-sm-9">
            <input id="full_name" name="full_name" class="form-control" placeholder="Guy Smiley">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Email:</label>

        <div class="col-sm-9">
            <input id="email" name="email" class="form-control" placeholder="guy-smiley@example.com">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Message:</label>

        <div class="col-sm-9">
            <textarea id="message" name="message" class="form-control"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">(Optional) Phone:</label>

        <div class="col-sm-9">
            <input id="phone" name="phone" class="form-control" placeholder="1234567890">
        </div>
    </div>

    <input type="submit" value="Send Message" class="btn btn-success">
</form>