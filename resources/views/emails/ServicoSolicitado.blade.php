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
            <table>
                <tr style="text-align: center;">
                <th style="width: 100%"><img style="margin-top:40px;width: 225px;height: 225px;" src="https://practice.uffs.cc/images/logo-icon.png"></th>
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
                        <table>
                        <tr>
                            <th style="width: 7.5%;"></th>
                            <th >
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
                        <a target="_blank" href="https://www.facebook.com/practice.uffs/"><img title="Facebook" src="https://lh3.googleusercontent.com/fife/AAWUweWoMXZS4SWr8bUZ8h2QNogYwlsbri1GLlGnO9LRBHWl7MZ_wZbUKNng5DgEDC_YFo6u9irGO8ZEnjd1E95a1fRT89ypLMCCXN8KDEzTmup7rNzKID-byCF9xhsZ7e7NW13WjYX0AVcEP_s-IFpnClDwtgmduRdmPZuXOH_n8ZToaBnTGHCh7JGEghu84UGmUExkGr1Btga7lyVsCIvEwdSe8RVa6qUcP1WEaJuXkyaXe8U4DhNmr8AnD7ePYOmJeDT805nFbmhG44iFCNIR_fT0aYv4DpUWrZesEMM69HgHJnZd3JKYuQPGUIVZB4GwRdAIJemfpxtskji_2JD0ocsL_PIKAjV2-ULojW1hEajSZvIh4tnynU5aw9lprxQ2CfrTYbBn8N4DJM6xcBflTgtvjNcHUKqWm4mcw_NesIKYe3LnVOiIOGaRKBEa3JNaaDKBkOFm_f3nOanqszWcpciQq9-XRiYIJw5XDDgeOMLdr8Oxg70SyOIYBwF4aoSRp9VbqkztOwZFyr2o9T5ufr8r0YJb2JzrpPWfd3cX8KAOAMc0-mXVs85tIXtRFTeorvI0xrQYyxVfGY8kN5kIsioE3u-krE1-2X4H_g_ON1QPsQZdMwXG4F4C0g77j2nA8m-3A-RwzWy5EhTV0fqdZXYm8k77Rn-lqsI1ScYr9htYxjxRjJ3_9v49xhlosmIpUS9iwe53RoyL_mEDiLt6TFyJoa3cEESl3Ew=w1204-h880-ft" alt="Facebook" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://github.com/orgs/practice-uffs"><img title="Github" src="https://lh3.googleusercontent.com/fife/AAWUweUGl4PsXIRgiES6QI-cIDXt98t2eJPq-MkTw6JBXjLA8wSry3kf7n8tvyESZc_jFvp3-csKuUWJQlpOiys671f1YPt8yx_0U3T-UrQmiit4AiTuw-FFyLB_G3NBYo6ILKq1o48ohZrcba01Paqak1eKroVLBfE88-ymO9sQlYsSLAZ-Ln8SPRSFmaT3NYF6wtcUf8qlvmnp_EaLDqAgfywzOlq76czmGE_nQ2xPsPOaVnOK0E5zcqCqaUYzSW3j6JclzeccCQ2FGJi5mCJvPuToGo8RTHSUluJbltn6M2lONEIkgQKZBkJ2DUu1Of5JWq3uf_BBg2EtfP10lOIJFqHXagX2IZ2Geg-5UB0y8T7scsi6aaGYrBgsOEA8nVFiZSWKRRTI-HOyFMDoTylqs87Ctc-gbRujJx6IngiXiuY0FSi-scxsMuFzb1UA4hVNP7VNH5GcDEmy-Fb-OsDiIhMOzALek0rA1ly-fKsyLWI6vkbL6E21g6FJ3t6yIEth3dTmNKygcuY_8wBZexf3nZeYKLOXX89WapKuyw42seXaiJUOGMmRp3b5IWlG-Pn1x-8BssBL32I32UhcQOUf2o7o4MU_4jw4Sti1ylfo2ifhBKXz57hbke3oWx6U6NkJlQvD98b24fsbSjXxbND8WihZZm6lCDSg7P60LvR_7lVxB2isIl-oJdGsfNbs3ZMPU7zwWKXOQH0W5mx35WNrLDtS-3ixENOVjdE=w1204-h880-ft" alt="Youtube" width="64" height="64" style="border:0;outline:none;"></a>   
                        <a target="_blank" href="https://www.instagram.com/practiceuffs/"><img title="Instagram" src="https://lh3.googleusercontent.com/fife/AAWUweXJucZAsh_mq_orkftE0pH86ib5ZNOGmup3C61J-w4Zv4G4A1Ww-u3SgnLGNkShIESjpWhgefFGSbUa0pFm0dyoTjWmqVbLf8mHmMMuWGQNlWwPJcAJJFFIK9fj5lUpzdYKkN5WYFwqr8lhaiiT7g9-fMPq_KN-Fde6-zSbiFwpZMXf384AiKh_yXT-jhztT6WBJvVIS9PS_LmkA1uggZ-71tvaxCDLay-kgOQ7n-rgibFfCqMAihNcItBdP8E_3ofmFYBSU9hXDikgeQ8WZYePg2PfIAaGLKYbNZm6bvMhS3_WOdO80lMxqgoWtMdE1SmIY5HdRnlSHjlBaDeWlsWGCFLIdW7h9C_4PwYRNom970V1s-8R02AodgUutIuKu0Ee0aloYsQOsWGLiJ_MuWfEzNxT3Ku80buudlsjGIQTyY7XUlGom6d7Q5PL1VEoHGPoyJ2K5woP1zEh5b-UoeGtNPvQX8LRH4H8GRtnKm-Jjc43lHfLMbmdvGuvLbUdiok5wEuYuUOdDNoGBXmuPEmdvvnwFx3HEzdDwtKATB215WYiMYz_uw-JpyP1oMatOpxIs-ycj3D0uxnMPCjOFWQ6CRtFGCPyWZGD9JavQRSfkaxaFtdBhmmbBRGqisNlGd7IBZ8tRIIsxUGfUHwwLFE68XSO-hQ4HEK_E8QbZ5G9n8Iad_zLfnCNMvigLg29J4-VdlhKPlKodZvVn9y5sGsTG3fKYJ2BQeM=w1204-h880-ft" alt="Instagram" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://twitter.com/PracticeUffs"><img title="Twitter" src="https://lh3.googleusercontent.com/fife/AAWUweW6c9RRBh0L6lak0QouHb77VqL1UtDt-p2HEfDNlKczZeNxZ-WYoAxO8elgJBvZcZsvxF2-GBG-kxAwlP37K2ozM86LR7dMbwyzjYCADANW0doykxsx4ECnUw1NY0Dy-6YXmIRUj1YRlrKo9mjgFz_c_a9f3FPsnroxhVA5ae1oPgWHRew7i0HOsmFpfoSfBH2lKH8a8dHEJUHP9Mm_J_J43PRFb-nIEEb1Z7C-5eeFS5dehMIkK98MU1YsWkrz_umJoYu246buLweipRCUquzXEHgMudVmBRqvuWF4I0sTuGt7ramVg3QsXOSUGTR5m_WBxmbuOxtTtiT2MTx5iuVTc0bUCmR8LOxPIW0wr9X5qJK82m_pSPxETtpqMijdR0I83DawuCI5BeeLbIk-kAzSW5-7HNE5P0cpdFte3yg9rhKwA01nIH8tIhzVHqMl3bkwsT2mHnuX785VcuhlAaabbtQce_qkrkZwwtJG46JM3lkXGEk1x3sBJrYvO3JrWoO25dPn912aHM9-8xCxgcZ5Gv-vbTfoZbxtjXc_IZYAByosnoNYFDYWSvmLTGSBcEcwUMExVIutQhZ85Xuxep9sP_66aIOKWxo-x4p0Pr-Uqqb6pj89gLidmslNQY-Ur4bsvaCXhgtX1hQy99o6sHOkf2uA76CABgF4bCd8szxBRIHEGHNl85hDYJrXGQjV102vbRBZGVDF6VCnN5ZqJA8NxiWh7RjzJNQ=w1204-h880-ft" alt="Instagram" width="64" height="64" style="border:0;outline:none;"></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCJZQqcpp1Zzd3eFZhpdzq9Q"><img title="Youtube" src="https://lh3.googleusercontent.com/fife/AAWUweWQYceUlYWUzDJhMM9YtpUSABOe7Pa55AaA42_V55-vAjy6mfNSoxIeeqbk7byD-1Ig4QbBbECeibe4f9XLeSqSUGqCXoCLD8f3QW4ilge-6wn4hqkb--sSyd_qPwZ-pHVu7momEomTFE9okB8a9ucqc9vfsqLyl4kdFtFxBwQUTaibAsuV5JTcV5Yq8IVss8xcupaXyZycjv0NGIv4zlvAwdyUwqw79fPVlxdcaqzHxWikzLBsXuRt3KcUrDpcV_e_qv_EsPouTm4rJELck5Hl_J3_eLX-t9yUqMfez2rdAVjKAEPQ2OrriggpLfzN-8GXJGVyUqafvmOvsqKqleM0yrQ6yn1NJWLUlBJT5xCAvBGUW66lvU4IBn2Ol2DkQ16Ok0cJsCHhjIuA9SoKw8Ua4j16odOXZyzow6SUIlifHzS0RWh-VwjDMcZVRkhGJNziUSzbxiyj2xSA8rlxV0V7eRs8HcmGtPrtYbv28FRY7vhMlrvdkjN540LzG-nPWcGFeseAEDGC6G8bB6Fz3K0ghUYVCaA7CQBSX2r9tX3jG7eI6jDH6XibEVAq2JE15cPV2D4nw19niBN3DdPXDuGaKDrg--CrrVvq5EcKAwWrRhdVallnMdrkn5V7CE8ovG0O_eqwM3E4YOJLiw6S9Ws129sJoi9h-lBY8SVRiEudtaht5RGQS_Ow6lM70_LC4ClC4haF6izO_I9LxW1LCFVBFRdocPzswkc=w1204-h880-ft" alt="Youtube" width="64" height="64" style="border:0;outline:none;"></a> 
                    </div>
                    
                    </th>   
                </tr>
            </table>    
            <div style="width:100%;">
                <img style="padding: 0;
                        margin: 0;
                        border: 0; 
                        width:100%;" 
                        src="https://lh3.google.com/u/0/d/1XIwX1kH4eHyVIVRD3dL2lIXd_gTTMWd8=w1920-h937-iv2">
            </div>
            </div>
        </th>
        <th style="width: 5%;"></th>
        </tr>
    </table>
</body>



                         