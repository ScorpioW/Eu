function mask(id)
{
    document.getElementById(id).addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
        });
}
function maskCP(idC, idA, ext)
{
    document.getElementById(idC).addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
        });
    document.getElementById(ext).addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
        });
    document.getElementById(idA).addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
        });
}
function init_mask()
{
    var x = mask('telMask[1]');
    var x = mask('telMask[2]');
    var x = maskCP('Cod', 'Area', 'Ext');
}
function dropClick() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
function mudarEmp(empresa)
{
    var dropDown = document.getElementById("selectbtn");
    var emp = document.getElementById("emp");
    dropDown.innerHTML = empresa;
    emp.value = empresa;
    if (emp.value == "Nenhuma")
    {
        document.getElementById("Ext").disabled = true;
        document.getElementById("Ext").value = "";
        document.getElementById("Loc").disabled = true;
        document.getElementById("Loc").value = "";
    } else
    {
        document.getElementById("Ext").disabled = false;
        document.getElementById("Loc").disabled = false;
    }
}
function priv()
{
    var ins = document.getElementById('ins');
    var del = document.getElementById('del');
    var cons = document.getElementById('cons');
    if (ins.checked || del.checked)
    {
        cons.disabled = true;
    } else if (!ins.checked && !del.checked)
    {
        cons.disabled = false;
    }
    if (del.checked)
    {
        cons.disabled = true;
        ins.disabled = true;
    } else
    {
        ins.disabled = false;
    }
}
function check()
{
    $('form').on('submit', function(e){
        if(!$('#emp:checkbox:checked').length > 0 && !$('#pes:checkbox:checked').length > 0) {
            document.getElementById("err").innerHTML = "<br>É necessário escolher uma opção de pesquisa!";
            e.preventDefault();
        }
    });
}