<script src="https://websdk.ujet.co/v1/loader/loader.js"></script>
<script>
    // Change those values for your test env
    const COMPANY_KEY = '15393635891434085ba28bb69831174ae'
    const URL = `https://ujetsales.ujet.co/api/v2`

    // INITIALIZE UJET WEB SDK
    $("#start-button").on('click', () => {
        if (UJET.initialized) {
            UJET.start().then(function () {
                console.log('UJET started!');
            }).catch(function (error) {
                console.log('error:', error);
            })
        }
    })

    UJET.initialize({
        logoUrl: 'https://ujet.co/wp-content/themes/ujet/dist/images/favicon.ico',
        translation: `{
            "en": {
              "ujet_message_chat_deflection_default": "We are currently unavailable. If between Monday through Friday, 7am - 5pm PT, then a team member will be available shortly to chat. You can also use our email form.",
              "ujet_common_support": " "
             }
          }`,
        theme: {
            color: '#3498db',
            font: '"Karla", sans-serif;'
        },
        iconSize: 84,
        iconPosition: {
            right: 5,
            bottom: 10
        },
        companyId: COMPANY_KEY,
        handlers: {
            authentication: function (callback) {
                getMyAuthToken(function (token) {
                    callback({
                        token: token,
                    })
                })
            }
        }
    }, URL);

    function getMyAuthToken(callback) {
        fetch('https://jwt-signer-sales.herokuapp.com/api/ujet/sign')
            .then(function (resp) {
                return resp.json();
            })
            .then(function (json) {
                callback(json.token);
            });
    }
</script>
