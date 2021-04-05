<div class="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Nossa Newsletter</h4>
            <p>Fique por dentro de todas as novidades do programa e dos projetos que estamos trabalhando.
              Inscreva-se para receber periodicamente a nossa newsletter em seu e-mail. </p>
          </div>
          <div class="col-lg-6">
            <form action="{{ route('subscribers.store') }}" method="post">
              @csrf
              <input type="email" name="email" placeholder="Ex. fulano@email.com">
              <input type="submit" value="Inscrever">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
