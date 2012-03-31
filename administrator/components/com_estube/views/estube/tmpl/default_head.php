<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
  <th width="5">    <input type="checkbox" name="toggle" value="" 
                 onclick="checkAll(<?php echo count($this->items); ?>);" /></th>
  <th width="10">
   ID
  </th>
  <th>
    Nome
  </th>
  <th>
    Article name
  </th>
  <th>
    Valor
  </th>
</tr>