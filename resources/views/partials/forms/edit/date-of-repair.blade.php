<!-- Ngày sửa chữa -->
<div class="form-group {{ $errors->has('date_of_repair') ? ' has-error' : '' }}">
   <label for="date_of_repair" class="col-md-3 control-label">{{ trans('general.date_of_repair') }}</label>
   <div class="input-group col-md-4">
        <div class="input-group date" data-provide="datepicker" data-date-clear-btn="true" data-date-format="yyyy-mm-dd"  data-autoclose="true">
            <input type="text" class="form-control" placeholder="{{ trans('general.select_date') }}" name="date_of_repair" id="date_of_repair" readonly value="{{  old('date_of_repair', ($item->date_of_repair) ? $item->date_of_repair->format('Y-m-d') : '') }}" style="background-color:inherit">
            <span class="input-group-addon"><x-icon type="calendar" /></span>
       </div>
       {!! $errors->first('date_of_repair', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
   </div>
</div>
