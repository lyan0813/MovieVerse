<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $query = Country::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        $countries = $query->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries,name'
        ]);

        Country::create($request->only('name'));

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country berhasil ditambahkan');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,'.$country->id
        ]);

        $country->update($request->only('name'));

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country berhasil diperbarui');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return back()->with('success', 'Country dihapus');
    }
}