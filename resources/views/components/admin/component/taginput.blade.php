@props(['title', 'name', 'value', 'tag' => null])
<div class="flex flex-col gap-2">
    <label class="">{{$title}}</label>
    <select class="js-example-basic-single" name="{{$name}}" multiple="multiple">
        @if(isset($value))
            @foreach($value as $item)
                <option value="{{ $item->tag }}" selected>{{ $item->tag }}</option>
            @endforeach
        @endif
        @if (isset($tag))
            @foreach($tag as $item)
                <option value="{{ $item->tag }}">{{ $item->tag }}</option>
            @endforeach
        @endif
    </select>
    <style>
        .select2 {
            width: 100% !important;
        }

        .selection .select2-selection {
            width: 100% !important;
            border-color: #d1d5db !important;
            min-height: 36px !important;
            padding: 0.5rem 0.75rem !important;
            border-radius: 0.375rem !important;
        }

        .selection .select2-selection:focus,
        .selection .select2-selection:focus-within {
            border: 2px solid;
            border-radius: 0.375rem !important;
            border-color: #6366f1 !important;
        }
        .selection li {
            margin-top: 0px !important;
            margin-left: 0px !important;
            margin-right: 0.25rem !important;
            line-height: 1.25rem !important;
        }
        .selection textarea {
            margin-top: 0px !important;
            margin-left: 0px !important;
            margin-bottom: 2px !important;
            line-height: 1.25rem !important;
        }
        .select2-dropdown {
            overflow: hidden;
            border-radius: 0.375rem !important;
            border: 2px solid #6366f1
        }
    </style>
</div>
<script>
    window.addEventListener('load', function() {
        var $j = jQuery.noConflict();
        $j('.js-example-basic-single').select2({
            tags: true,
            tokenSeparators: [','],
            // maximumSelectionLength: 10,
        });
    });
</script>