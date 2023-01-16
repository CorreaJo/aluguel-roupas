<div class="content">
    <form action="{{route('pesquisa', Auth::user()->loja_Id)}}" class="pesquisar">
        <div>
            <input class="input-pesquisar" type="text" placeholder="Pesquisar por nome ou código" name="pesquisa">
            <x-button>
                Pesquisar
            </x-button>
        </div>
        <div>
            <input class="radio" type="radio" value="nome" id="nome" name="tipo_pesquisa" checked> 
            <label for="nome">Nome</label>

            <input class="radio" type="radio" value="codigo" id="codigo" name="tipo_pesquisa">
            <label for="codigo">Código</label>
        </div>
    </form>

    <div> 
        <a  class="cadastrar" href="{{route('roupa.create', Auth::user()->loja_Id)}}">
            <img src="{{asset('image/Vectorcadastrar.png')}}" alt="">
            <div>
                Cadastrar Roupa
            </div>
        </a>
    </div>
</div>

<style>
    .content {
        width: 70vw;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 5%;
    }
    .pesquisar {
        width: 60%;
    }
    .radio {
        margin-left: 10px;
    }
    .input-pesquisar {
        padding: 5px;
        border-radius: 5px;
        width: 70%;
    }
    .input-pesquisar::placeholder{
        padding-left: 10px;
    }
    .cadastrar {
        background-color: #ffc300;
        width: 100%;
        display: flex;
        padding: 10px;
        color: white;
        font-weight: 600;
        border-radius: 5px;
        margin-left: 20px;
        justify-content: center;
        transition: 0.4s;
    }

    .cadastrar img {
        margin-right: 3%;
    }

    .cadastrar:hover {
        background-color:  #ffd60a;
    }
</style>