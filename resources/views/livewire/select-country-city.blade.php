{{-- <div class="row mb-3">
    <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="country">Select Country</label>
            <select class="form-control" wire:model="country_code" id="country" name="country_code" required>
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select>
            @error('country_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="city">Select City</label>
            <select class="form-control" wire:model="city" id="city" name="city" required>
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div> --}}



<div class="row mb-3">
    <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="country">Select Country</label>
            <select class="form-control" wire:model.live="country_code" id="country" required>
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('country_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="form-group">
            <label for="city">Select City</label>
            <select class="form-control" wire:model.live="city" id="city" required>
                <option value="">Select City</option>
                @foreach($cities as $city)
                <option value="{{ $city}}">{{ $city}}</option>
            @endforeach
            </select>
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
