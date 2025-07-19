<?php

namespace App\Livewire\Account\MyProfile;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $image;
    public $name;
    public $no_hp;
    public $email;

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->name = auth()->guard('customer')->user()->name;
        $this->no_hp = auth()->guard('customer')->user()->no_hp;
        $this->email = auth()->guard('customer')->user()->email;
    }

    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image',
            'name'  => 'required',
            'no_hp'  => 'required',
            'email' => 'required|email|unique:customers,email,'. auth()->guard('customer')->user()->id,
        ];
    }

    public function update()
    {
        // Validasi input
        $this->validate();

        // Cek apakah ada gambar yang di-upload
        if ($this->image) {
            // Upload gambar
            $imageName = $this->image->hashName();
            $this->image->storeAs('avatars', $imageName);

            // Update data pengguna dengan gambar
            $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
            $profile->update([
                'name'  => $this->name,
                'no_hp'  => $this->no_hp,
                'email' => $this->email,
                'image' => $imageName,
            ]);
        } else {
            // Update tanpa gambar
            $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
            $profile->update([
                'name'  => $this->name,
                'no_hp'  => $this->no_hp,
                'email' => $this->email,
            ]);
        }
        dd($profile);

        // Kirim pesan sukses
        session()->flash('success', 'Update Profil Berhasil');

        // redirect to the desired page
        return $this->redirect('/account/my-profile', navigate: true);

    }

    public function render()
    {
        return view('livewire.account.my-profile.index');
    }
}
