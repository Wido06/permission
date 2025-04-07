


<div class="row mb-3" >
    <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="country" class="col-sm-12 col-form-label">Select Country</label>
            <select class="form-control" wire:model.live="country_code" id="country" name="country_code" required >
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country['iso2'] }}"
                        @if(old('country_code') == $country['iso2'] || $country_code == $country['iso2']) selected @endif>
                        {{ $country['name'] }}
                    </option>
                @endforeach
            </select>
            @error('country_code')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- City Selection -->
    {{-- <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="city" class="col-sm-12 col-form-label">Select City</label>
            <select class="form-control" wire:model.live="city" id="city" name="city" required  >
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}"
                        @if(old('city') == $city || $city == $city) selected @endif>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
            @error('city')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div> --}}
</div>
