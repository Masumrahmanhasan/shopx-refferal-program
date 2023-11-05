define(["require", "exports", "./jmbg.js"], function (require, exports, jmbg_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    function meId(value) {
        return {
            meta: {},
            valid: (0, jmbg_1.default)(value, 'ME'),
        };
    }
    exports.default = meId;
});
