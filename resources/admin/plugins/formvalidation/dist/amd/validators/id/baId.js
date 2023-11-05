define(["require", "exports", "./jmbg.js"], function (require, exports, jmbg_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    function baId(value) {
        return {
            meta: {},
            valid: (0, jmbg_1.default)(value, 'BA'),
        };
    }
    exports.default = baId;
});
