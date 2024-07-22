"use-stric";

import moment from "moment";
import { usePage } from "@inertiajs/inertia-vue3";

class Helpers {
    /**
     * Format currency to colombian representation $
     * @param {*} integer Number
     * @returns
     */
    formatCurrencyCo(value) {
        return parseFloat(value).toLocaleString("es-CO", {
            style: "currency",
            currency: "COP",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });
    }

    /**
     * Format date with hours
     * @param {*} date
     * @returns
     */
    formatDateWhitHours(date) {
        return moment(date).format("YYYY-MM-DD HH:mm:ss");
    }

    /**
     * Format date
     * @param {*} date
     * @returns
     */
    formatDate(date) {
        return moment(date).format("YYYY-MM-DD");
    }

    /**
     * Divide array into parts
     * @param {*} array
     * @param {*} size
     * @returns
     */
    chunk(array, size) {
        return Array.from({ length: Math.ceil(array.length / size) }, (v, i) =>
            array.slice(i * size, i * size + size)
        );
    }

    /**
     * Check if the authenticated user has a specific permission.
     *
     * This function checks if the authenticated user has a specific permission. If the user has the "admin" role,
     * it grants access unconditionally. Otherwise, it checks if the provided permission is included in the user's
     * list of permissions.
     *
     * @param {string, array} permissions The permission to check.
     * @returns {boolean} Returns true if the user has the permission,
     * or if the user has the "admin" role; otherwise, returns false.
     */
    can(permissions) {
        const page = usePage();
        const userPermissions = page.props.value.auth.permissions;
        const userRoles = page.props.value.auth.roles;

        if (userRoles.includes("admin")) {
            return true;
        }

        const permissionsToCheck = Array.isArray(permissions)
            ? permissions
            : [permissions];

        return permissionsToCheck.some((permission) =>
            userPermissions.includes(permission)
        );
    }
}

export default new Helpers();
