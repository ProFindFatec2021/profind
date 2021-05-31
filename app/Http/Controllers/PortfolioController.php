<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Anuncio;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    private function editarFotoPortfolio(Request $request, $id)
    {
        if ($id) {
            $anuncio = Portfolio::select('foto_portfolio')->where('id', $id)->first();

            if ($anuncio->foto_portfolio)
                Storage::delete($anuncio->foto_portfolio);
        }
        if ($request->hasFile('foto_portfolio') && $request->file('foto_portfolio')->isValid())
            $nome_imagem = Storage::put('portfolio', $request->foto_portfolio);
        else return false;

        Portfolio::where('id', $id)->update([
            'foto_portfolio' => $nome_imagem ?? null,
        ]);
        return true;
    }

    public function index()
    {
        return view('dashboard.profissional.portfolio.index', ['portfolios' => Portfolio::where('profissional_id', Auth::id())->get()]);
    }

    public function create()
    {
        $anuncios = Anuncio::where('usuario_id', Auth::id())->get();
        return view('dashboard.profissional.portfolio.create', ['anuncios' => $anuncios]);
    }

    public function store(PortfolioRequest $request)
    {
        $id = Portfolio::create([
            'anuncio_id' => $request->anuncio_id,
            'profissional_id' => Auth::id(),
            'descricao' => $request->descricao ?? null,
        ])->id;

        $this->editarFotoPortfolio($request, $id);

        return redirect()->route('dashboard.profissional.portfolio.index')->with('success', 'Portfolio criado com sucesso');
    }

    public function show(Portfolio $portfolio)
    {
        //
    }

    public function edit(Portfolio $portfolio)
    {
        //
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    public function destroy(Request $request)
    {
        Portfolio::where('id', $request->id)->delete();

        return redirect()->route('dashboard.profissional.portfolio.index')->with('error', 'Portfolio deletado com sucesso');
    }
}
