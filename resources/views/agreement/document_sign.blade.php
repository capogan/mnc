 <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="widht=device-widht , initial-scale=1.0">
         <meta http-equiv="X-UA-Competible" content="ie-edge">
         <title>Document</title>
     </head>
     <body>
         <div class="privy-document"></div>
         <script src="https://unpkg.com/privy-sdk@next"></script>

         <script>
             Privy.openDoc('018bdb3fdf908db47fae691036c1f3379d19ddccbc0d5e51a6d5b92e52aabf39',
                dev:true,
                container : '.privy-document',
                privyid : 'DEVRI2838',
                signature : {
                    page : 4,
                    x:130,
                    y:468,
                    fixed : false
                }
             ).on('after-action' , (data)=> {
                 location.href = '127.0.0.1:8001/profile/lender/register/sign'
             }).on('after-sign' , (data)=> {
                 location.href = '127.0.0.1:8001/profile/lender/register/sign'
             }).on('review' , (data)=> {
                 location.href = '127.0.0.1:8001/profile/lender/register/sign'
             })
         </script>
     </body>
 </html>