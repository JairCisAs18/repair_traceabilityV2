@include('header')
<style>
      thead > tr{
        background-color: rgb(118, 175, 118);
      }
      #openModalBtn{
        background-color: rgb(47, 165, 47);
      }
      #openModalBtn:hover{
        background-color: rgb(118, 175, 118);
      }
      #main{
        width: 100%;
        height: 80px;
        display: flex;
        justify-content: space-around;
        align-items: center;
      }
  </style>
<body>
  <script src="{{ asset ('scripts/modal.js') }}"></script>
  <script src="{{ asset ('scripts/store.js') }}"></script>
  <section>
    <div id="content-header">
      <h1>Piezas entrantes</h1>
      <button id="openModalBtn" onclick="openModal()">Reparada</button>
  </div>
    <table>
      <thead>
        <tr>
          <th>RNO</th>
          <th>SNA</th>
          <th>FECHA DE SALIDA</th>
          <th>PROCESO</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($parts as $p)
          <tr>
            <td>{{$p->getRNO()}}</td>
            <td>{{$p->SNA}}</td>
            <td>{{$p->END_DATE}}</td>
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
      <form action="{{ route('addRepaired') }}" method="POST">
        <div id="main">
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