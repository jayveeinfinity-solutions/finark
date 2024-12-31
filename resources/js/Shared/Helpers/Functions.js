import { usePage } from '@inertiajs/vue3';

const page = usePage();
    
const hasRole = (...roles) => {
    if(page.props.auth.user.roles) {
        return roles.includes(page.props.auth.user.roles.name);
    }
    return false;
}

const deSlug = (slug) => {
    var words = slug.split('-');
    for (var i = 0; i < words.length; i++) {
        var word = words[i];
        words[i] = word.charAt(0).toUpperCase() + word.slice(1);
    }
    return words.join(' ');
}

const capitalized = (string) => {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

const toUserInitial = (string) => {
    if(!string) {
        return false;
    }
    const strings = string.split(" ");
    return strings.length > 1 ? strings[0][0].toUpperCase() + strings[1][0].toUpperCase() : strings[0][0].toUpperCase();
}

export default {
    hasRole,
    deSlug,
    capitalized,
    toUserInitial
};