@include('header')
<style>
      thead > tr{
        background-color: lightskyblue;
      }
      #openModalBtn{
        background-color: #1773FB;
      }
      #openModalBtn:hover{
        background-color: lightskyblue;
      }
      #main{
        width: 100%;
        height: 80px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
      }
  </style>
<body>
  <script src="{{ asset ('scripts/modal.js') }}"></script>
  <script src="{{ asset ('scripts/store.js') }}"></script>
  <section>
    <div id="content-header">
      <h1>Piezas entrantes</h1>
      <button id="openModalBtn" onclick="openModal()">Introducir piezas</button>
  </div>
    <table>
      <thead>
        <tr>
          <th>RNO</th>
          <th>SNA</th>
          <th>FECHA DE REGISTRO</th>
          <th>PROCESO</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($parts as $p)
          <tr>
            <td>{{$p->getRNO()}}</td>
            <td>{{$p->SNA}}</td>
            <td>{{$p->INIT_DATE}}</td>
            <td>{{$p->getProcess()}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <div id="modal-header">
        <h2>Introducir piezas</h2>
        <span class="close">&times;</span>
      </div>
      <form action="{{ route('addPart') }}" method="POST">
        <div id="main">
          <div class="input-section">
            <label for="process">Proceso:</label>
            <select name="process" id="process">
              @foreach ($processes as $pr)
                <option value="{{$pr->id}}">{{$pr->PROCESS_NAME}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-section">
            <label for="sna">SNA:</label>
            @csrf
            <input type="text" name="sna" id="sna" autocomplete="off">
          </div>
          <input type="submit" value="Registrar">
        </div>
        <ul id="list"></ul>
        <div id="items"></div>
        <div id="items2"></div>
      </form>
    </div>
  </div>
</body>