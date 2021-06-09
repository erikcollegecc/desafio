@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
@endif


@csrf
<input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do produto" value="{{$produto->nome_produto ?? old('nome_produto')}}"><br>
<textarea name="descricao" id="descricao" cols="30" rows="1" placeholder="Descrição do produto">{{$produto->descricao ?? old('descricao')}}</textarea><br>
<input type="text" name="breve_descricao" id="breve_descricao" placeholder="Breve descrição" value="{{$produto->breve_descricao ?? old('breve_descricao')}}"><br>
<input type="text" name="ref" id="ref" placeholder="Referência de estoque" value="{{$produto->ref ?? old('ref')}}"><br>

<select name="tipo_produto" id="tipo_produto" class="form-control">
    <option value="" selected></option>
    <option @if ('tipo_produto == 1')
        
    @endif value="{{('1')}}">Produto Simples</option>
    <option @if ('tipo_prouto == 2')
        
    @endif value="{{('2')}}">Grupo de Produtos</option>
    <option @if ('tipo_produto == 3')
        
    @endif value="{{('3')}}">Produto Variavel</option>
</select>

<hr>
    
    Simples <br>
    <input type="text" name="" id="" placeholder="Preço R$" value="">
    <input type="text" name="" id="" placeholder="Preço promocional R$" value=""><br>

    <hr>

    Digital <br>
    <input type="text" name="" id="" placeholder="Nome do arquivo" value="">
    <input type="file" name="" id="">

    <hr>

    Grupo <br>
    <textarea name="" id="" cols="30" rows="5" placeholder="Pesquisar um produto"></textarea>

    <hr>

    Variavel <br>

    <hr>



    Atributos: <br>
    <input type="text" name="nome_atributos" id="nome_atributos" placeholder="Nome atributos" value="{{$produto->nome_atributos ?? old('nome_atributos')}}"><br>
    <textarea type="text" name="atributos" id="atributos" cols='30' rows="3" placeholder="Coloque as caracteristacas do produto e separe com |">{{$produto->atributos ?? old('atributos')}}</textarea>
    <input type="checkbox" name="atributos_visivel" id="atributo_visivel"><label>Visível na página de produto</label><br>
    <hr>
    <label for=""><strong>Imagem do produto: </strong></label><input type="file" name="image" id="image" value="{{$produto->image ?? old('image')}}"><br>
    <hr>
    <button type="submit">Salvar</button>