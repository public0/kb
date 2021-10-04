/**
 * Swag
 *
 * Copyright (c) 2021 Ringhel Team SRL. All rights reserved.
 */

function isJSON(val) {
    try {
        JSON.parse(val);
    } catch {
        return false;
    }
    return true;
}

function normalizeHeaders(headers) {
    var newHeaders = {};
    var name, key, keys = Object.keys(headers), n = keys.length;
    while (n--) {
        key = keys[n];
        name = key;
        if (name.includes('-')) {
            name = key.toLowerCase()
                .replace('-', '- ')
                .replace(/\b[a-z]/g, function (letter) {
                    return letter.toUpperCase();
                })
                .replace('- ', '-');
        }
        newHeaders[name] = headers[key];
    }

    return newHeaders;
}

function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null|base64)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var after = '';
        var cls = 'jt-number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'jt-key';
                match = match.slice(0, -1);
                after = ':';
            } else {
                cls = 'jt-string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'jt-boolean';
        } else if (/null/.test(match)) {
            cls = 'jt-null';
        } else if (/base64/.test(match)) {
            cls = 'jt-keyword';
        }

        return '<span class="' + cls + '">' + match + '</span>' + after;
    });
}

function keywordsHighlight(json) {
    return json.replace(/(JSON|ARRAY|DATE|DATETIME)/g, function (match) {
        return '<span class="jt-keyword">' + match + '</span>';
    });
}

function commentHighlight(json) {
    return json.replace(/\/\*.+\*\//g, function (match) {
        return '<span class="jt-comments">' + match + '</span>';
    });
}

function drawHighlight() {
    $('pre').each(function (k, v) {
        var txt = $(v).text();
        try {
            txt = JSON.stringify(JSON.parse(txt.replace(/(\n|\r)/gm, '')), null, 4);
        } catch {
        }
        txt = syntaxHighlight(txt);
        txt = keywordsHighlight(txt);
        txt = commentHighlight(txt);
        $(v).html(txt);
    });
}

function documentURLData() {
    var fullObj = $('.document-full-url');
    var schemaObj = $('#DocumentSchemaURL');
    var schema = schemaObj.val();
    var baseObj = $('#DocumentBaseURL');
    var base = baseObj.val().toLowerCase();
    fullObj.addClass('d-none');
    if (schema && base) {
        var schemaOptions = $.map($('option', schemaObj), function (option) {
            return option.value;
        });
        if (!base.includes('://')) {
            base = schema + '://' + base;
        }
        var parser = document.createElement('a');
        parser.href = base;
        var sch = parser.protocol.replace(':', '');
        if (schemaOptions.includes(sch)) {
            schema = sch;
            schemaObj.val(schema);
        }
        base = parser.hostname;
        baseObj.val(base);
        $('.pre span', fullObj).text(schema + '://' + base);
        fullObj.removeClass('d-none');
    }
}

function drawResponse(mainSelector, status, message, appendHTML) {
    var html = '';
    if (typeof appendHTML !== 'undefined') {
        html += appendHTML;
    }
    html += '<div class="section-title fs-14 mt-6">Server Response</div>';
    html += '<table class="section-table">';
    html += '<thead>';
    html += '<tr>';
    html += '<th width="100">Code</th>';
    html += '<th>Description</th>';
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';
    html += '<tr valign="top"><td class="pb-5 fs-14">' + status + '</td><td class="pb-5"><pre>' + message + '</pre></td></tr>';
    html += '</tbody>';
    html += '</table>';
    $('.execution-response', mainSelector).html(html);
}

$(document).ready(function () {
    drawHighlight();
    documentURLData();
    $('#DocumentSchemaURL, #DocumentBaseURL').on('change', function (e) {
        e.preventDefault();
        documentURLData();
    });
    $('.auth-button').on('click', function (e) {
        e.preventDefault();
        function setAuth(action) {
            var btn = $('.modal .btn-indigo');
            var input = $('.modal .param-input');
            var isAuth = sessionStorage.getItem('auth');
            if (isAuth) {
                if (action) {
                    sessionStorage.removeItem('auth');
                    input.val('');
                    btn.html(btnAuth);
                    input.prop('disabled', false);
                } else {
                    input.val(JSON.parse(isAuth).value);
                    btn.html(btnUnauth);
                    input.prop('disabled', true);
                }
            } else {
                if (action) {
                    input.removeClass('has-error').removeAttr('title');
                    var token = input.val();
                    if (token) {
                        auth.value = token;
                        sessionStorage.setItem('auth', JSON.stringify(auth));
                        btn.html(btnUnauth);
                        input.prop('disabled', true);
                    } else {
                        input.addClass('has-error').attr('title', requredErrorMessage);
                    }
                } else {
                    btn.html(btnAuth);
                    input.prop('disabled', false);
                }
            }
        }
        var auth = $(this).data('auth');
        var html = '<div class="modal show" aria-modal="true" role="dialog" tabindex="-1">';
        html += '<div class="modal-dialog" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<h6 class="modal-title">' + modalTitle + '</h6>';
        html += '<button aria-label="' + btnClose + '" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>';
        html += '</div>';
        html += '<div class="modal-body">';
        html += '<p class="mb-1">Name: <span class="h6">' + auth.name + '</span></p>';
        if (auth.type) {
            html += '<p class="mb-1">Type: <span class="text-monospace">' + auth.type + '</span></p>';
        }
        if (auth.location) {
            html += '<p class="mb-1">In: <span class="text-monospace">' + auth.location + '</span></p>';
        }
        if (auth.description) {
            html += '<p class="mb-1">' + auth.description + '</p>';
        }
        html += '<hr class="my-3" />';
        html += '<label>Value</label><br />';
        html += '<input type="text" class="param-input w-100" />';
        html += '</div>';
        html += '<div class="modal-footer justify-content-center">';
        html += '<button class="btn btn-indigo" type="button">' + btnAuth + '</button>';
        html += '<button class="btn btn-gray" data-dismiss="modal" type="button">' + btnClose + '</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('body').append(html);
        $('.modal').modal({ backdrop: 'static', keyboard: true }).on('hidden.bs.modal', function () {
            $(this).remove();
        });
        $('.modal .btn-indigo').on('click', function (e) {
            e.preventDefault();
            setAuth(true);
        });
        setAuth(false);
    });
    $('.btn-try-method').on('click', function (e) {
        e.preventDefault();
        var activeTab = '.tab-pane.active';
        var methodReqAuth = $(this, activeTab).data('req-auth');
        var methodID = $(this, activeTab).data('method-id');
        var mainSelector = activeTab + ' #' + methodID + ' .document-full-url';
        var auth = $('.auth-button').data('auth');
        var req = {
            type: $(this, activeTab).data('method-type'),
            url: $('.pre', mainSelector).text(),
            headers: {}
        };
        if (auth.headers) {
            $.each(auth.headers.replace(/\n\r/g, "\n").replace(/\r\n/g, "\n").split("\n"), function (k, v) {
                var parts = v.split(':');
                req.headers[parts[0].trim()] = parts[1].trim();
            });
        }
        var isCancel = $(this, activeTab).hasClass('btn-red');
        if (isCancel) {
            $(this, activeTab).removeClass('btn-red').addClass('btn-gray').html(btnTryOut);
            $('#' + methodID + ' .param-input.has-error', activeTab).removeClass('has-error').removeAttr('title');
            $('.btn-group-execute', mainSelector).remove();
        } else {
            $(this, activeTab).addClass('btn-red').removeClass('btn-gray').html(btnCancel);
            var html = '<div class="mt-2 btn-group-execute">';
            html += '<div class="text-right"><div class="btn-group btn-group-sm" role="group">';
            html += '<button type="button" class="btn btn-azure btn-exec">' + btnExecute + '</button>';
            html += '<button type="button" class="btn btn-gray btn-clear" disabled="disabled">' + btnClear + '</button>';
            html += '</div></div>';
            html += '<div class="execution-response"></div>';
            html += '</div>';
            $(mainSelector).append(html);
        }
        var params = [];
        $('#' + methodID + ' .param-input', activeTab).each(function (k, v) {
            params.push($(v).data('param'));
            $(v).prop('disabled', isCancel);
        });
        var loader = '<div class="sk-circle" style="margin:0 auto"> <div class="sk-circle1 sk-child"></div> <div class="sk-circle2 sk-child"></div> <div class="sk-circle3 sk-child"></div> <div class="sk-circle4 sk-child"></div> <div class="sk-circle5 sk-child"></div> <div class="sk-circle6 sk-child"></div> <div class="sk-circle7 sk-child"></div> <div class="sk-circle8 sk-child"></div> <div class="sk-circle9 sk-child"></div> <div class="sk-circle10 sk-child"></div> <div class="sk-circle11 sk-child"></div> <div class="sk-circle12 sk-child"></div> </div>';
        $('.btn-exec', activeTab).on('click', function (e) {
            e.preventDefault();
            $('.btn-clear', activeTab).prop('disabled', false);
            var errors = 0, url = req.url, headers = $.extend({}, req.headers), qs = {}, data = {}, replaceData = {};
            // Auth
            var auth = sessionStorage.getItem('auth');
            if (methodReqAuth && auth) {
                auth = JSON.parse(auth);
                switch (auth.location) {
                    case 'header':
                        headers[auth.name] = auth.value;
                        break;
                }
            }
            headers = normalizeHeaders(headers);
            // Parse params
            $.each(params, function (k, v) {
                var input = $('#' + methodID + ' .param-input[placeholder="' + v.name + '"]', activeTab);
                var val = (function (input, type) {
                    var val = input.val();
                    if (isJSON(val) && Object.keys(replaceData).length) {
                        var newVal = JSON.parse(val);
                        $.extend(newVal, replaceData);
                        val = JSON.stringify(newVal);
                    }
                    switch (type) {
                        case 'integer':
                            val = parseInt(val);
                            break;
                        case 'float':
                        case 'double':
                            val = parseFloat(val);
                            break;
                        case 'base64':
                            val = btoa(val);
                            break;
                        case 'file':
                            headers['Content-Type'] = 'multipart/form-data';
                            val = input[0].files[0];
                            val.localAbsolutePath = input.val();
                            break;
                    }
                    return val;
                })(input, v.type);
                input.removeClass('has-error').removeAttr('title');
                if (parseInt(v.required) && v.location && !val) {
                    input.addClass('has-error').attr('title', requredErrorMessage);
                    errors += 1;
                }
                switch (v.location) {
                    case 'body':
                        data[v.name] = val;
                        break;
                    case 'query':
                        qs[v.name] = val;
                        break;
                    case 'header':
                        headers[v.name] = val;
                        break;
                    case 'path':
                        url = url.replace('{' + v.name + '}', val);
                        break;
                    default:
                        if (val) {
                            replaceData[v.name] = val;
                        }
                        break;
                }
            });
            // Query string
            if (Object.keys(qs).length) {
                url = url + '?' + $.param(qs);
            }
            // Exec with zero errors
            if (errors === 0) {
                $('.execution-response', mainSelector).html(loader);
                var curlCommand = ["curl -X " + req.type, "\t" + url];
                $.each(headers, function (k, v) {
                    curlCommand.push("\t" + '-H "' + k + ':' + v + '"');
                });
                $.each(data, function (k, v) {
                    if (Object.prototype.toString.call(v) === '[object File]') {
                        curlCommand.push("\t" + '-F "' + k + '=@' + v.localAbsolutePath + '"');
                    } else {
                        curlCommand.push("\t" + '-d "' + k + '=' + v.replace(/"/g, '\\"') + '"');
                    }
                });
                // HTTP Error 411. The request must be chunked or have a content length.
                if (!Object.keys(data).length) {
                    curlCommand.push("\t" + '-d ""');
                }
                // CURL html response
                var curlHTML = '<div class="section-title fs-14 mt-1">cURL</div>';
                curlHTML += '<div class="pre text-monospace">' + curlCommand.join(" \\\n") + '</div>';
                // Requester
                var ajaxData = {};
                if (Object.keys(data).length) {
                    ajaxData = {
                        data: (function (data, headers) {
                            if ('Content-Type' in headers) {
                                if (headers['Content-Type'] === 'application/json') {
                                    return JSON.stringify(data);
                                }
                                if (headers['Content-Type'] === 'multipart/form-data') {
                                    var fd = new FormData();
                                    $.each(data, function (k, v) {
                                        fd.append(k, v);
                                    });
                                    delete headers['Content-Type'];
                                    return fd;
                                }
                            }
                            return data;
                        })(data, headers)
                    };
                }
                $.ajax(url, $.extend({
                    method: req.type,
                    headers: headers,
                    contentType: false,
                    processData: false,
                    success: function (resp, status, xhr) {
                        drawResponse(mainSelector, xhr.status, xhr.responseText, curlHTML);
                        drawHighlight();
                    },
                    error: function (xhr) {
                        drawResponse(mainSelector, xhr.status, xhr.responseText, curlHTML);
                        drawHighlight();
                    }
                }, ajaxData));
            }
        });
        $('.btn-clear', activeTab).on('click', function (e) {
            e.preventDefault();
            $('#' + methodID + ' .param-input.has-error', activeTab).removeClass('has-error').removeAttr('title');
            $('.execution-response', mainSelector).html('');
            $(this).prop('disabled', true);
        });
    });
});
