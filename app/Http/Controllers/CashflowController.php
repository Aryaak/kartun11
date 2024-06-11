<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CashflowController extends Controller
{
    public function index()
    {
        $search = request('search');

        $cashflows = Cashflow::where('name', 'LIKE', "%$search%")
            ->paginate(10);

        return view('pages.cashflows.index', compact(
            'search',
            'cashflows'
        ));
    }

    public function edit(Cashflow $cashflow)
    {
        return view('pages.cashflows.edit', compact('cashflow'));
    }

    public function update(Cashflow $cashflow)
    {
        $validated = request()->all();

        if (request()->hasFile('file')) {
            if ($cashflow->file) {
                Storage::disk('public')->delete($cashflow->file);
            }
            $filePath = request()->file('file')->store('images/cashflow', 'public');
            $cashflow->file = $filePath;
        }

        $cashflow->name = $validated['name'];
        $cashflow->nominal = $validated['nominal'];
        $cashflow->date = $validated['date'];
        $cashflow->type = $validated['type'];
        $cashflow->save();

        return redirect()->route('cashflow.index')->with('success', 'Anggaran berhasil diubah');
    }

    public function create()
    {
        return view('pages.cashflows.create');
    }

    public function store()
    {
        $validated = request()->all();

        if (request()->hasFile('file')) {
            $filePath = request()->file('file')->store('images/cashflow', 'public');
        }

        $cashflow = new Cashflow();
        $cashflow->name = $validated['name'];
        $cashflow->nominal = $validated['nominal'];
        $cashflow->date = $validated['date'];
        $cashflow->type = $validated['type'];
        $cashflow->file = $filePath;

        $cashflow->save();

        return redirect()->route('cashflow.index')->with('success', 'Anggaran baru berhasil dibuat');
    }
}
