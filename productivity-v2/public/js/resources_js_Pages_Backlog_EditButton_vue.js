"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Backlog_EditButton_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'EditButton',
  props: {
    initialText: {
      type: String,
      required: true
    }
  },
  setup: function setup(__props, _ref) {
    var __expose = _ref.expose;
    __expose();
    var props = __props;
    var _toRefs = (0,vue__WEBPACK_IMPORTED_MODULE_0__.toRefs)(props),
      initialText = _toRefs.initialText;
    var text = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(initialText.value); // Texto inicial
    var editText = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(''); // Variable temporal para el texto editado
    var isEditing = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(false); // Bandera para controlar el modo de edición

    (0,vue__WEBPACK_IMPORTED_MODULE_0__.watch)(initialText, function (newVal) {
      text.value = newVal;
    });
    var toggleEditing = function toggleEditing() {
      isEditing.value = !isEditing.value; // Cambiar el modo de edición
      if (isEditing.value) {
        editText.value = text.value; // Copiar el texto inicial para editar
      }
    };
    var saveChanges = function saveChanges() {
      text.value = editText.value; // Actualizar el texto original
      isEditing.value = false; // Salir del modo de edición
    };
    var __returned__ = {
      props: props,
      initialText: initialText,
      text: text,
      editText: editText,
      isEditing: isEditing,
      toggleEditing: toggleEditing,
      saveChanges: saveChanges,
      ref: vue__WEBPACK_IMPORTED_MODULE_0__.ref,
      watch: vue__WEBPACK_IMPORTED_MODULE_0__.watch,
      toRefs: vue__WEBPACK_IMPORTED_MODULE_0__.toRefs
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7":
/*!***********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7 ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "flex"
};
var _hoisted_2 = {
  key: 0
};
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  "class": "w-6 h-6 text-gray-800 dark:text-white",
  "aria-hidden": "true",
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  fill: "none",
  viewBox: "0 0 24 24"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  stroke: "currentColor",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  d: "M5 11.917 9.724 16.5 19 7.5"
})], -1 /* HOISTED */);
var _hoisted_4 = [_hoisted_3];
var _hoisted_5 = {
  key: 0,
  "class": "w-6 h-6 text-gray-800 dark:text-white",
  "aria-hidden": "true",
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  fill: "none",
  viewBox: "0 0 24 24"
};
var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  stroke: "currentColor",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  d: "M6 18L18 6M6 6l12 12"
}, null, -1 /* HOISTED */);
var _hoisted_7 = [_hoisted_6];
var _hoisted_8 = {
  key: 1,
  "class": "ml-2 w-5 h-5 text-gray-800 dark:text-white",
  "aria-hidden": "true",
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  fill: "none",
  viewBox: "0 0 24 24"
};
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  stroke: "currentColor",
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  "stroke-width": "2",
  d: "M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"
}, null, -1 /* HOISTED */);
var _hoisted_10 = [_hoisted_9];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [!$setup.isEditing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.text), 1 /* TEXT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.isEditing ? (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("input", {
    key: 1,
    type: "text",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.editText = $event;
    }),
    "class": "h-7 rounded-md"
  }, null, 512 /* NEED_PATCH */)), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.editText]]) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $setup.isEditing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("button", {
    key: 2,
    onClick: $setup.saveChanges
  }, [].concat(_hoisted_4))) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: $setup.toggleEditing
  }, [$setup.isEditing ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_5, [].concat(_hoisted_7))) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_8, [].concat(_hoisted_10)))])]);
}

/***/ }),

/***/ "./resources/js/Pages/Backlog/EditButton.vue":
/*!***************************************************!*\
  !*** ./resources/js/Pages/Backlog/EditButton.vue ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _EditButton_vue_vue_type_template_id_6a821cb7__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./EditButton.vue?vue&type=template&id=6a821cb7 */ "./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7");
/* harmony import */ var _EditButton_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./EditButton.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_EditButton_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_EditButton_vue_vue_type_template_id_6a821cb7__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Backlog/EditButton.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_EditButton_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_EditButton_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./EditButton.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7":
/*!*********************************************************************************!*\
  !*** ./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7 ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_EditButton_vue_vue_type_template_id_6a821cb7__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_EditButton_vue_vue_type_template_id_6a821cb7__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./EditButton.vue?vue&type=template&id=6a821cb7 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Backlog/EditButton.vue?vue&type=template&id=6a821cb7");


/***/ })

}]);