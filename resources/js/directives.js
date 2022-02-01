export function updateFunction(el, binding) {
    let options = binding.value || {};
    $(el).select2({
        data: options,
        placeholder: 'Select'
    }).on("select2:select", (e) => {
        console.log(e.params.data.id);
        el.dispatchEvent(new Event('change', { target: e.target }));
    });
}