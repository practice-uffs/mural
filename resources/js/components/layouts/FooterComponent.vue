<template>
        <!-- WebFeedback Footer -->
        <footer>
                <!-- Grid row -->
            <div class="container grid-items">

                <!-- Grid column -->
                <div class="grid-item">

                    <h4 >Web Feedback</h4>
                    <p >
                        Web Feedback é um projeto que objetiva estreitar a comunicação
                        entre a comunidade UFFS e o programa Practice. Com ele é possível
                        que você publique seus comentários, sugestões e ideias voltadas para
                        a melhoria do ensino e da educação para que assim o Practice tenha 
                        facilidade no planejamento e execução de seus projetos.
                    </p>
                </div>

                <!-- Grid column -->
                <div class="grid-item">
                    <h5 class="white-text">Saiba mais</h5>
                    <ul>
                        <li>
                            <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/sobre/" target="blank">Sobre</a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/equipe/" target="blank">Quem somos</a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/parcerias" target="blank">Parcerias</a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="https://github.com/practice-uffs" target="blank">Github</a>
                        </li>
                    </ul>
                </div>

                <div class="text-light text-center">
                    <p>
                        Projeto licenciado sobre os termos da <a href="https://www.apache.org/licenses/LICENSE-2.0" target="_blank" class="footer__link">Apache License.</a>
                    </p>
                    <p>
                        Build with <svg class="footer_heart" viewBox="0 0 32 29.6" width="15"> <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2 c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                        </svg> by <a href="https://pt.wikipedia.org/wiki/C%C3%B3digo_aberto" target="_blank" rel="noopener noreferrer" class="footer__link">
                        OpenSource Community.
                        </a>
                    </p>
                    <div class="col text-center text-tiny" style="font-size: 0.8em; color: #bfbfbf;">
                        As imagens utilizadas nesse site tem como fonte <a href="https://undraw.co/" rel="nofollow" target="_blank">undraw.co/</a><br>
                          Created by
                            <a href="https://twitter.com/ninaLimpi" rel="nofollow" target="_blank" style="color: #bfbfbf;">Katerina Limpitsouni</a>,
                          Code / Design by
                            <a href="https://twitter.com/anges244" rel="nofollow" target="_blank" style="color: #bfbfbf;">Aggelos Gesoulis</a>.
                    </div>
                </div>
            </div>

        </footer>
</template>

<style scoped>
footer {
  background-color: #ff8429;
  padding-bottom: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex: 1;
}
.grid-items{
  justify-content: center;
  display: flex;
  flex-wrap: wrap;
}
.grid-item{
  color: #f4f4f4;
  width: 40%;
  padding: 50px;   
}
a:link {
  color: #f4f4f4;
  text-decoration: none;
}

a:visited {
  color: #f4f4f4;
  text-decoration: none;
}

a:hover {
  color: blue;
  text-decoration: none;
}

a:active {
  color: #f4f4f4;
  text-decoration: none;
}
.footer_heart{
  fill: red;
}
</style>