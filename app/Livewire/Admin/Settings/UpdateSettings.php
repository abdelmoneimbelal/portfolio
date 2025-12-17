<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateSettings extends Component
{
    use WithFileUploads;
    public $settings;
    public $logo, $favicon;

    public function mount()
    {
        $this->settings = Setting::find(1);
    }

    public function rules()
    {
        return [
            'settings.name' => 'required|string',
            'settings.email' => 'required|email',
            'settings.phone' => 'required',
            'settings.address' => 'required',
            'settings.website' => 'nullable|url',
            'settings.facebook' => 'nullable|url',
            'settings.twitter' => 'nullable|url',
            'settings.linkedin' => 'nullable|url',
            'settings.instagram' => 'nullable|url',
            'settings.description' => 'nullable|string|min:10',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        if ($this->logo) {
            $logoName = time() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('images', $logoName, 'public');
            $data['logo'] = 'storage/images/' . $logoName;
        } else {
            // keep the old image if no new image uploaded
            unset($data['logo']);
        }
        if ($this->favicon) {
            $faviconName = time() . '.' . $this->favicon->getClientOriginalExtension();
            $this->favicon->storeAs('images', $faviconName, 'public');
            $data['favicon'] = 'storage/images/' . $faviconName;
        } else {
            // keep the old image if no new image uploaded
            unset($data['favicon']);
        }
        $this->settings->update($data);
        session()->flash('message', 'Settings Updated Successfully');
    }

    public function render()
    {
        return view('admin.settings.update-settings');
    }
}
