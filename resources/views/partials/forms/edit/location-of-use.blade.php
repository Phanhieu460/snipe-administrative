<!-- Location of use -->
<div class="form-group {{ $errors->has('location_of_use') ? ' has-error' : '' }}">
    <label for="location_of_use" class="col-md-3 control-label">{{ $translated_location_of_use }}</label>
    <div class="col-md-7 col-sm-12">
        <input class="form-control" style="width:100%;" type="text" name="location_of_use" placeholder="Enter any text" aria-label="location_of_use" id="location_of_use" value="{{ old('location_of_use', $item->location_of_use) }}"{!!  (Helper::checkIfRequired($item, 'location_of_use')) ? ' required' : '' !!} maxlength="191" />
        {!! $errors->first('location_of_use', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
    </div>
</div>
