<div id="assigned_specification" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}">

    <label for="{{ $fieldname }}" class="col-md-3 control-label">{{ $translated_name }}</label>

    <div class="col-md-7">
        <select 
            class="js-data-ajax" 
            data-endpoint="specifications" 
            data-placeholder="{{ trans('general.select_specification') }}" 
            name="{{ $fieldname }}" 
            id="specification_select" 
            style="width: 100%" 
            aria-label="{{ $fieldname }}"
            {{ (isset($multiple) && $multiple == 'true') ? " multiple='multiple'" : '' }}
        >
            @isset($selected)
                @foreach (is_iterable($selected) ? $selected : [$selected] as $specification_id)
                    <option value="{{ $specification_id }}" selected="selected">
                        {{ \App\Models\Specification::find($specification_id)?->name }}
                    </option>
                @endforeach
            @endisset

            @php
                $old_id = old($fieldname, $item->{$fieldname} ?? null);
            @endphp
            @if ($old_id)
                <option value="{{ $old_id }}" selected="selected">
                    {{ \App\Models\Specification::find($old_id)?->name }}
                </option>
            @endif
        </select>
    </div>

    {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fas fa-times"></i> :message</span></div>') !!}

</div>
