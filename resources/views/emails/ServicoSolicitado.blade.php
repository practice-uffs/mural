<body style="padding: 0;
            margin: 0;
            border: 0; 
            background-color: rgb(236, 236, 236);;
            width:100%;
            height: 100%;
            font-family:arial, 'helvetica neue', helvetica, sans-serif;"> 
    <table style="width:100%">
        <tr>
        <th style="width: 5%;"></th>
        <th>
            <div style="background-color: rgb(255, 255, 255);
                    width: 100%;
                    border-radius: 10px;">
            <table style="width: 100%;">
                <tr style="text-align: center;">
                <th style="width: 100%"><img style="margin-top:40px;width: 225px;height: 225px;" src="https://cdn.uffs.cc/practice/website/assets-email/logo-icon.png"></th>
                </tr>
                <tr >
                    <th style="width: 100%;text-align: center">
                        <p style=" padding: 0;
                                margin: 0;
                                border: 0; 
                                margin-top: 100px;
                                text-align: center;
                                color: rgb(38, 70, 83);
                                font-size: 1.5em;">Olá {{$user->name ?? 'Cliente Practice'}},</p>  
                        <table style="width:100%">
                        <tr>
                            <th style="width: 7.5%;"></th>
                            <th style="width: 85%;">
                            <p style=" padding: 0;
                                    margin: 0;
                                    border: 0; 
                                    margin-top: 20px;
                                    text-align: center;
                                    color: rgb(38, 70, 83);
                                    font-size: 1.5em;
                                    width: 100%;
                                    ">Informamos que a sua solicitação "#{{$item->id ?? ""}} - {{$item->title ?? ""}}" foi cadastrada com sucesso. Você receberá uma resposta da equipe do PRACTICE em até três dias úteis.</p>  
                            </th>
                            <th style="width: 7.5%;"></th>
                        </tr>
                        </table>
                        <p style=" padding: 0;
                                    margin: 0;
                                    border: 0; 
                                    margin-top: 20px;
                                    text-align: center;
                                    color: rgb(38, 70, 83);
                                    font-size: 1.5em;">Atenciosamente, equipe PRACTICE.</p>  
                        <p style=" padding: 0;
                                    margin: 0;
                                    border: 0; 
                                    margin-top: 50px;
                                    text-align: center;
                                    color: rgb(38, 70, 83);
                                    font-size: 1.2em;">ESTA É UMA MENSAGEM AUTOMÁTICA. POR FAVOR, NÃO RESPONDA!</p>  
                    </th>
                </tr>
                <tr style="text-align: center;">
                    <th>
                    <div style="margin-top: 50px;">
                        <a target="_blank" href="https://www.facebook.com/practice.uffs/"><img title="Facebook" src="https://cdn.uffs.cc/practice/website/assets-email/facebook.png" alt="Facebook" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://github.com/orgs/practice-uffs"><img title="Github" src="https://cdn.uffs.cc/practice/website/assets-email/github.png" alt="Youtube" width="64" height="64" style="border:0;outline:none;"></a>   
                        <a target="_blank" href="https://www.instagram.com/practiceuffs/"><img title="Instagram" src="https://cdn.uffs.cc/practice/website/assets-email/instagram.png" alt="Instagram" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://twitter.com/PracticeUffs"><img title="Twitter" src="https://cdn.uffs.cc/practice/website/assets-email/twitter.png" alt="Instagram" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCJZQqcpp1Zzd3eFZhpdzq9Q"><img title="Youtube" src="https://cdn.uffs.cc/practice/website/assets-email/youtube.png" alt="Youtube" width="64" height="64" style="border:0;outline:none;"></a> 
                    </div>
                    
                    </th>   
                </tr>
                <tr>
                        <th>
                            <img style="padding: 0;margin: 0;border: 0; width:100%;" src="https://cdn.uffs.cc/practice/website/assets-email/barra.png">
                        </th>                  
                    </tr>
            </table>    
            </div>
        </th>
        <th style="width: 5%;"></th>
        </tr>
    </table>
</body>



                         