                    <div class="form-group">
                        <label class="control-label col-sm-2" >Author</label>
                        <div class="col-md-10">
                            <select id="admin" type="admin" value="{!! old('admin') !!}" class="form-control" name="admin">
                                <option value="">Select Author</option>
                                @foreach ($admins as $admin)
                            <option value="{!! $admin->id !!}">{!! $admin->name !!}</option>
                                @endforeach
                            </select>

                            @if($errors->has('admin'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('admin') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>