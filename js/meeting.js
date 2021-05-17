import { ZoomMtg } from '@zoomus/websdk';

const testTool = window.testTool;
var sessionLevel = '<%=Session["level"]%>'
var exitUrl ='';
if(sessionLevel=='Admin'){
    exitUrl ='/view/dashboard/halaman_admin.php'
}else(
    exitUrl ='/view/dashboard/halaman_pegawai.php'
);
// get meeting args from url
const tmpArgs = testTool.parseQuery();
const meetingConfig = {
    apiKey: tmpArgs.apiKey,
    meetingNumber: tmpArgs.mn,
    userName: (function () {
        if (tmpArgs.name) {
            try {
                return testTool.b64DecodeUnicode(tmpArgs.name);
            } catch (e) {
                return tmpArgs.name;
            }
        }
        return (
            `CDN#${
                tmpArgs.version
            }#${
                testTool.detectOS()
            }#${
                testTool.getBrowserInfo()}`
        );
    }()),
    passWord: tmpArgs.pwd,
    leaveUrl: exitUrl,
    role: parseInt(tmpArgs.role, 10),
    userEmail: (function () {
        try {
            return testTool.b64DecodeUnicode(tmpArgs.email);
        } catch (e) {
            return tmpArgs.email;
        }
    }()),
    lang: tmpArgs.lang,
    signature: tmpArgs.signature || '',
    china: tmpArgs.china === '1',
};

console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));

// it's option if you want to change the WebSDK dependency link resources. setZoomJSLib must be run at first
ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();
function beginJoin(signature) {
    ZoomMtg.init({
        leaveUrl: meetingConfig.leaveUrl,
        webEndpoint: meetingConfig.webEndpoint,
        success() {
            console.log(meetingConfig);
            console.log('signature', signature);
            ZoomMtg.i18n.load(meetingConfig.lang);
            ZoomMtg.i18n.reload(meetingConfig.lang);
            ZoomMtg.join({
                meetingNumber: meetingConfig.meetingNumber,
                userName: meetingConfig.userName,
                signature,
                apiKey: meetingConfig.apiKey,
                userEmail: meetingConfig.userEmail,
                passWord: meetingConfig.passWord,
                success(res) {
                    console.log('join meeting success');
                    console.log('get attendeelist');
                    ZoomMtg.getAttendeeslist({});
                    ZoomMtg.getCurrentUser({
                        success(res) {
                            console.log('success getCurrentUser', res.result.currentUser);
                        },
                    });
                },
                error(res) {
                    console.log(res);
                },
            });
        },
        error(res) {
            console.log(res);
        },
    });

    ZoomMtg.inMeetingServiceListener('onUserJoin', (data) => {
        console.log('inMeetingServiceListener onUserJoin', data);
    });

    ZoomMtg.inMeetingServiceListener('onUserLeave', (data) => {
        console.log('inMeetingServiceListener onUserLeave', data);
    });

    ZoomMtg.inMeetingServiceListener('onUserIsInWaitingRoom', (data) => {
        console.log('inMeetingServiceListener onUserIsInWaitingRoom', data);
    });

    ZoomMtg.inMeetingServiceListener('onMeetingStatus', (data) => {
        console.log('inMeetingServiceListener onMeetingStatus', data);
    });
}

beginJoin(meetingConfig.signature);
