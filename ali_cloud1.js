$(".detail-left")[3].id="developer-submit-slider-one"
var cc = new window.noCaptcha({
                        renderTo: "#developer-submit-slider-one",
                        appkey: "M39P",
                        scene: 'register',
                        trans: {
                            key1: "code0"
                        },
                        token: (new Date).getTime() + Math.random(),
                        callback: function(t) {
                            console.log(t)
                                                        fetch("https://developer.aliyun.com/developer/api/award/receivePrize", {
  "headers": {
    "accept": "application/json, text/plain, */*",
    "accept-language": "zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7",
    "content-type": "application/json",
    "developer-collina-csessionid": t.csessionid,
    "developer-collina-sig": t.sig,
    "developer-collina-token": t.token,
    "developer-task-caller": "{"name":"workbench","version":"1.0","module-name":"@ali/hmod-ace-card-experiment-maincontent","module-version":"0.0.43","url":"https://workbench.aliyun.com/activities/k8s"}",
    "sec-fetch-dest": "empty",
    "sec-fetch-mode": "cors",
    "sec-fetch-site": "same-site"
  },
  "referrer": "https://workbench.aliyun.com/",
  "referrerPolicy": "strict-origin-when-cross-origin",
  "body": "{"mobile":"电话","awardId":"4d16ac0e54d34d9bb56d78ed49a0a838","name":"名字","extension":"{ 'address': '地址' }"}",
  "method": "POST",
  "mode": "cors",
  "credentials": "include"
}).then(function(response) {return response.json()}).then(function(Json) {
console.log(Json);
cc.reload()})
                        }
                    })
