webpackHotUpdate("room-meeting",{

/***/ "./js/room-meeting.js":
/*!****************************!*\
  !*** ./js/room-meeting.js ***!
  \****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _zoomus_websdk__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @zoomus/websdk */ \"./node_modules/@zoomus/websdk/index.js\");\n/* harmony import */ var _zoomus_websdk__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_zoomus_websdk__WEBPACK_IMPORTED_MODULE_0__);\nvar _this = undefined;\n\n\nvar API_KEY = '95xcQU6DSmqDt_1vBtIOKw';\nvar API_SECRET = 'kwEcxbGaHkEqHJWUhB5pVaUGjvp1QJ9pNOBw';\n\nfunction serialize(obj) {\n  var keyOrderArr = ['name', 'mn', 'email', 'pwd', 'role', 'lang', 'signature', 'china'];\n\n  Array.intersect = function () {\n    var result = new Array();\n    var obj = {};\n\n    for (var i = 0; i < arguments.length; i++) {\n      for (var j = 0; j < arguments[i].length; j++) {\n        var str = arguments[i][j];\n\n        if (!obj[str]) {\n          obj[str] = 1;\n        } else {\n          obj[str]++;\n\n          if (obj[str] == arguments.length) {\n            result.push(str);\n          }\n        }\n      }\n    }\n\n    return result;\n  };\n\n  if (!Array.prototype.includes) {\n    Object.defineProperty(Array.prototype, 'includes', {\n      enumerable: false,\n      value: function value(obj) {\n        var newArr = this.filter(function (el) {\n          return el === obj;\n        });\n        return newArr.length > 0;\n      }\n    });\n  }\n\n  var tmpInterArr = Array.intersect(keyOrderArr, Object.keys(obj));\n  var sortedObj = [];\n  keyOrderArr.forEach(function (key) {\n    if (tmpInterArr.includes(key)) {\n      sortedObj.push([key, obj[key]]);\n    }\n  });\n  Object.keys(obj).sort().forEach(function (key) {\n    if (!tmpInterArr.includes(key)) {\n      sortedObj.push([key, obj[key]]);\n    }\n  });\n\n  var tmpSortResult = function (sortedObj) {\n    var str = [];\n\n    for (var p in sortedObj) {\n      if (typeof sortedObj[p][1] !== 'undefined') {\n        str.push(\"\".concat(encodeURIComponent(sortedObj[p][0]), \"=\").concat(encodeURIComponent(sortedObj[p][1])));\n      }\n    }\n\n    return str.join('&');\n  }(sortedObj);\n\n  return tmpSortResult;\n}\n\nfunction b64EncodeUnicode(str) {\n  // first we use encodeURIComponent to get percent-encoded UTF-8,\n  // then we convert the percent encodings into raw bytes which\n  // can be fed into btoa.\n  return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function (match, p1) {\n    return String.fromCharCode(\"0x\".concat(p1));\n  }));\n}\n\n$(document).ready(function () {\n  $('#zmmtg-root').remove();\n  $('#join_meeting').click(function () {\n    _zoomus_websdk__WEBPACK_IMPORTED_MODULE_0__[\"ZoomMtg\"].generateSignature({\n      meetingNumber: $(_this).attr('data-meeting-id'),\n      apiKey: API_KEY,\n      apiSecret: API_SECRET,\n      role: 0,\n      success: function success(res) {\n        console.log(res.result); // 'name', 'mn', 'email', 'pwd', 'role', 'lang', 'signature', 'china'\n\n        var data = {\n          name: $('#join_meeting').attr('data-name'),\n          mn: parseInt($('#join_meeting').attr('data-meeting-id')),\n          email: 'apem@bolu.com',\n          pwd: $('#join_meeting').attr('data-meeting-password'),\n          role: 0,\n          lang: 'en-US',\n          signature: res.result,\n          apiKey: API_KEY,\n          china: 0\n        };\n        console.log(data);\n        var joinUrl = \"/meeting.php?\".concat(serialize(data));\n        console.log(joinUrl);\n        window.open(joinUrl, '_blank');\n      }\n    });\n  });\n});\n\n//# sourceURL=webpack:///./js/room-meeting.js?");

/***/ })

})