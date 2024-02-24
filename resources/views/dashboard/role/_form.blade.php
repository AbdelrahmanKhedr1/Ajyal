<x-forms.errors />

    <x-forms.input label="Name" type="text" name="name" :value="$role->name" placeholder="Enter Name" />
        <fieldset>
            <legend>{{ __('Abilities') }}</legend>

            @foreach (app('abilities') as $ability_code => $ability_name)
            <div class="row mb-2">
                <div class="col-md-6">
                    {{ is_callable($ability_name)? $ability_name() : $ability_name }}
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="allow" @checked(($role_abilities[$ability_code] ?? '') == 'allow')>
                    Allow
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="deny" @checked(($role_abilities[$ability_code] ?? '') == 'deny')>
                    Deny
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="inherit" @checked(($role_abilities[$ability_code] ?? '') == 'inherit')>
                    Inherit
                </div>
            </div>
            <hr>
            @endforeach
        </fieldset>

    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save' }} </button>
