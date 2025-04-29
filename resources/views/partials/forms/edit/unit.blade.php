<!-- Unit -->
<div class="form-group {{ $errors->has('unit') ? ' has-error' : '' }}">
    <label for="unit" class="col-md-3 control-label">{{ $translated_unit }}</label>
    <div class="col-md-7 col-sm-12">
        <input class="form-control" style="width:100%;" type="text" name="unit" placeholder="Enter any text" aria-label="unit" id="unit" value="{{ old('unit', $item->unit) }}"{!!  (Helper::checkIfRequired($item, 'unit')) ? ' required' : '' !!} maxlength="191" />
        {!! $errors->first('unit', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
    </div>
</div>
