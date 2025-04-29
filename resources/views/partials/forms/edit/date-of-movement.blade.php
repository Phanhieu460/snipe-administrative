<!-- Ngày di chuyển -->
<div class="form-group {{ $errors->has('date_of_movement') ? ' has-error' : '' }}">
   <label for="date_of_movement" class="col-md-3 control-label">{{ trans('general.date_of_movement') }}</label>
   <div class="input-group col-md-4">
        <div class="input-group date" data-provide="datepicker" data-date-clear-btn="true" data-date-format="yyyy-mm-dd"  data-autoclose="true">
            <input type="text" class="form-control" placeholder="{{ trans('general.select_date') }}" name="date_of_movement" id="date_of_movement" readonly value="{{  old('date_of_movement', ($item->date_of_movement) ? $item->date_of_movement->format('Y-m-d') : '') }}" style="background-color:inherit">
            <span class="input-group-addon"><x-icon type="calendar" /></span>
       </div>
       {!! $errors->first('date_of_movement', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
   </div>
</div>
