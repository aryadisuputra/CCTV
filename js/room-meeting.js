import { ZoomMtg } from '@zoomus/websdk';

const API_KEY = '95xcQU6DSmqDt_1vBtIOKw';
const API_SECRET = 'kwEcxbGaHkEqHJWUhB5pVaUGjvp1QJ9pNOBw';

function serialize(obj) {
    const keyOrderArr = [
        'name',
        'mn',
        'email',
        'pwd',
        'role',
        'lang',
        'signature',
        'china',
    ];

    Array.intersect = function () {
        const result = new Array();
        const obj = {};
        for (let i = 0; i < arguments.length; i++) {
            for (let j = 0; j < arguments[i].length; j++) {
                const str = arguments[i][j];
                if (!obj[str]) {
                    obj[str] = 1;
                } else {
                    obj[str]++;
                    if (obj[str] == arguments.length) {
                        result.push(str);
                    }
                }
            }
        }
        return result;
    };

    if (!Array.prototype.includes) {
        Object.defineProperty(Array.prototype, 'includes', {
            enumerable: false,
            value(obj) {
                const newArr = this.filter(el => el === obj);
                return newArr.length > 0;
            },
        });
    }

    const tmpInterArr = Array.intersect(keyOrderArr, Object.keys(obj));
    const sortedObj = [];
    keyOrderArr.forEach((key) => {
        if (tmpInterArr.includes(key)) {
            sortedObj.push([key, obj[key]]);
        }
    });
    Object.keys(obj)
        .sort()
        .forEach((key) => {
            if (!tmpInterArr.includes(key)) {
                sortedObj.push([key, obj[key]]);
            }
        });
    const tmpSortResult = (function (sortedObj) {
        const str = [];
        for (const p in sortedObj) {
            if (typeof sortedObj[p][1] !== 'undefined') {
                str.push(
                    `${encodeURIComponent(sortedObj[p][0])}=${encodeURIComponent(
                        sortedObj[p][1]
                    )}`
                );
            }
        }
        return str.join('&');
    }(sortedObj));
    return tmpSortResult;
}

function b64EncodeUnicode(str) {
    // first we use encodeURIComponent to get percent-encoded UTF-8,
    // then we convert the percent encodings into raw bytes which
    // can be fed into btoa.
    return btoa(
        encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, (
            match,
            p1
        ) => String.fromCharCode(`0x${p1}`))
    );
}

$(document).ready(() => {
    $('#zmmtg-root').remove();
    $('#join_meeting').click(() => {
        ZoomMtg.generateSignature({
            meetingNumber: parseInt($('#join_meeting').attr('data-meeting-id')),
            apiKey: API_KEY,
            apiSecret: API_SECRET,
            role: parseInt(0, 10),
            success(res) {
                console.log(res.result);

                // 'name', 'mn', 'email', 'pwd', 'role', 'lang', 'signature', 'china'
                const data = {
                    name: b64EncodeUnicode($('#join_meeting').attr('data-name')),
                    mn: parseInt($('#join_meeting').attr('data-meeting-id')),
                    email: b64EncodeUnicode($('#join_meeting').attr('data-email')),
                    pwd: $('#join_meeting').attr('data-meeting-password'),
                    role: parseInt(0, 10),
                    lang: 'en-US',
                    signature: res.result,
                    apiKey: API_KEY,
                    china: 0,
                };

                console.log(data);

                const joinUrl = `/meeting.php?${serialize(data)}`;
                console.log(joinUrl);
                window.open(joinUrl, '_blank');
            },
        });
    });
});
