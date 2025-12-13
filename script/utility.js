function wrapText(text, maxLength = 25, isUrl = false) {
    let result = "";
    let line = "";

    const words = text.split(" ");

    for (let w of words) {
        if ((line + w).length > maxLength) {
            result += line.trim() + "\n";
            line = "";
        }
        line += w + " ";
    }

    return result + line.trim();
}

function imagePlaceholderUrl(text) {
    wrappedText = encodeURIComponent(wrapText(text));
    return `https://placehold.co/800?text=${wrappedText}&font=roboto`;
}