<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="Benja" />
      <meta name="company" content="Microsoft Corporation" />
      {{-- <style type="text/css">
        html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
        a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
        div.comment { display:none }
        table { border-collapse:collapse; page-break-after:always }
        .gridlines td { border:1px dotted black }
        .gridlines th { border:1px dotted black }
        .b { text-align:center }
        .e { text-align:center }
        .f { text-align:right }
        .inlineStr { text-align:left }
        .n { text-align:right }
        .s { text-align:left }
        td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style3 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style3 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:6pt; background-color:white }
        th.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Arial'; font-size:6pt; background-color:white }
        td.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style9 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
        th.style9 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:white }
        td.style10 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style10 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style11 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style11 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style12 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style12 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style13 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style13 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style14 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style14 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style17 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style17 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style18 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style18 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style19 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#843C0B; font-family:'Constantia'; font-size:20pt; background-color:#CCFFFF }
        th.style19 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#843C0B; font-family:'Constantia'; font-size:20pt; background-color:#CCFFFF }
        td.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style21 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style21 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style23 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style23 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style24 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style24 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style25 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style25 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style26 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style26 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style27 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style27 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#FF9900; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#FF9900; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style29 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style29 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style30 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style30 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style31 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style31 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #843C0B !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#D6DCE5 }
        th.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #843C0B !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#D6DCE5 }
        td.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#D6DCE5 }
        th.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#D6DCE5 }
        td.style34 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style34 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style35 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style35 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style36 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #843C0B !important; border-top:2px solid #843C0B !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#D6DCE5 }
        th.style36 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #843C0B !important; border-top:2px solid #843C0B !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#D6DCE5 }
        td.style37 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style37 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style38 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style38 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style39 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style39 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style40 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style40 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style42 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style42 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#1F4E79; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Calibri Light'; font-size:10pt; background-color:#DAE3F3 }
        th.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000080; font-family:'Calibri Light'; font-size:10pt; background-color:#DAE3F3 }
        td.style44 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#DAE3F3 }
        th.style44 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#DAE3F3 }
        td.style45 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style45 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style46 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style46 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style47 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style47 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style48 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style48 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style49 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style49 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style50 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style50 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style51 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style51 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style53 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style53 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style54 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style54 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style55 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#2F5597; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style55 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#2F5597; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style56 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style56 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#203864; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style57 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style57 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style58 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style58 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style59 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style59 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style60 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
        th.style60 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:white }
        td.style61 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style61 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style62 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style62 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style63 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style63 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style64 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        th.style64 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        td.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style66 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        th.style66 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        td.style67 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Century Schoolbook'; font-size:11pt; background-color:white }
        th.style67 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Century Schoolbook'; font-size:11pt; background-color:white }
        td.style68 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style68 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style70 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        th.style70 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        td.style71 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        th.style71 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        td.style72 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style72 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style73 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:9pt; background-color:#FFFFFF }
        th.style73 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#203864; font-family:'Arial'; font-size:9pt; background-color:#FFFFFF }
        td.style74 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        th.style74 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:#FFFFFF }
        td.style75 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style75 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style76 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        th.style76 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        td.style77 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        th.style77 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
        td.style78 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Broadway'; font-size:10pt; background-color:#B4C7E7 }
        th.style78 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000080; font-family:'Broadway'; font-size:10pt; background-color:#B4C7E7 }
        td.style79 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#B4C7E7 }
        th.style79 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#B4C7E7 }
        td.style80 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style80 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style81 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style81 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style82 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style82 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style83 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
        th.style83 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:6pt; background-color:white }
        td.style84 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style84 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style85 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style85 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style86 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style86 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        th.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        td.style88 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style88 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style89 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style89 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style90 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style90 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style91 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        th.style91 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
        td.style92 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        th.style92 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:9pt; background-color:white }
        td.style93 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style93 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style95 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#FFC000 }
        th.style95 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:9pt; background-color:#FFC000 }
        td.style96 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        th.style96 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
        td.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        th.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:white }
        td.style98 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style98 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        table.sheet0 col.col0 { width:100.98888773pt }
        table.sheet0 col.col1 { width:42pt }
        table.sheet0 col.col2 { width:42pt }
        table.sheet0 col.col3 { width:42pt }
        table.sheet0 col.col4 { width:42pt }
        table.sheet0 col.col5 { width:42pt }
        table.sheet0 col.col6 { width:42pt }
        table.sheet0 col.col7 { width:42pt }
        table.sheet0 col.col8 { width:71.84444362pt }
        table.sheet0 tr { height:15pt }
        table.sheet0 tr.row0 { height:15pt }
        table.sheet0 tr.row1 { height:15.75pt }
        table.sheet0 tr.row2 { height:16.5pt }
        table.sheet0 tr.row3 { height:15.75pt }
        table.sheet0 tr.row4 { height:15.75pt }
        table.sheet0 tr.row5 { height:27pt }
        table.sheet0 tr.row6 { height:30pt }
        table.sheet0 tr.row7 { height:15.75pt }
        table.sheet0 tr.row8 { height:15.75pt }
        table.sheet0 tr.row9 { height:15.75pt }
        table.sheet0 tr.row10 { height:15.75pt }
        table.sheet0 tr.row11 { height:15.75pt }
        table.sheet0 tr.row12 { height:23.25pt }
        table.sheet0 tr.row13 { height:23.25pt }
        table.sheet0 tr.row14 { height:15pt }
        table.sheet0 tr.row15 { height:15pt }
        table.sheet0 tr.row16 { height:15pt }
        table.sheet0 tr.row17 { height:28.5pt }
        table.sheet0 tr.row18 { height:30.75pt }
        table.sheet0 tr.row19 { height:31.5pt }
        table.sheet0 tr.row20 { height:30.75pt }
        table.sheet0 tr.row21 { height:31.5pt }
        table.sheet0 tr.row22 { height:29.25pt }
        table.sheet0 tr.row23 { height:15pt }
        table.sheet0 tr.row24 { height:15pt }
        table.sheet0 tr.row25 { height:15pt }
        table.sheet0 tr.row26 { height:15pt }
        table.sheet0 tr.row27 { height:15pt }
        table.sheet0 tr.row28 { height:21pt }
        table.sheet0 tr.row29 { height:13.5pt }
        table.sheet0 tr.row30 { height:15pt }
        table.sheet0 tr.row31 { height:15.75pt }
        table.sheet0 tr.row32 { height:16.5pt }
        table.sheet0 tr.row33 { height:16.5pt }
        table.sheet0 tr.row34 { height:16.5pt }
        table.sheet0 tr.row35 { height:15.75pt }
        table.sheet0 tr.row36 { height:23.25pt }
        table.sheet0 tr.row37 { height:15pt }
        table.sheet0 tr.row38 { height:15pt }
        table.sheet0 tr.row39 { height:7.5pt }
        table.sheet0 tr.row40 { height:21pt }
        table.sheet0 tr.row41 { height:9.75pt }
        table.sheet0 tr.row42 { height:24.75pt }
        table.sheet0 tr.row43 { height:9pt }
        table.sheet0 tr.row44 { height:27pt }
        table.sheet0 tr.row45 { height:39pt }
      </style> --}}
        <style type="text/css">
            html{font-family:Calibri,Arial,Helvetica,sans-serif;font-size:11pt;background-color:#fff}a.comment-indicator:hover+div.comment{background:#ffd;position:absolute;display:block;border:1px solid #000;padding:.5em}a.comment-indicator{background:#f00;display:inline-block;border:1px solid #000;width:.5em;height:.5em}div.comment{display:none}table{border-collapse:collapse;page-break-after:always}.gridlines td{border:1px dotted #000}.gridlines th{border:1px dotted #000}.b{text-align:center}.e{text-align:center}.f{text-align:right}.inlineStr{text-align:left}.n{text-align:right}.s{text-align:left}td.style0{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style0{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style1{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style1{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style2{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style2{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style3{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style3{vertical-align:bottom;border-bottom:none #000;border-top:2px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style4{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style4{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style5{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style5{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style6{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style6{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style7{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000080;font-family:'Arial';font-size:6pt;background-color:#fff}th.style7{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000080;font-family:'Arial';font-size:6pt;background-color:#fff}td.style8{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style8{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style9{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Calibri';font-size:12pt;background-color:#fff}th.style9{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Calibri';font-size:12pt;background-color:#fff}td.style10{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style10{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style11{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style11{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style12{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style12{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style13{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style13{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style14{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style14{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style15{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style15{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style16{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style16{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style17{vertical-align:top;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style17{vertical-align:top;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style18{vertical-align:top;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style18{vertical-align:top;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style19{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#843c0b;font-family:'Constantia';font-size:20pt;background-color:#cff}th.style19{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#843c0b;font-family:'Constantia';font-size:20pt;background-color:#cff}td.style20{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style20{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style21{vertical-align:middle;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style21{vertical-align:middle;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style22{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style22{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style23{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style23{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style24{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style24{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style25{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style25{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style26{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style26{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style27{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style27{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style28{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#f90;font-family:'Arial';font-size:10pt;background-color:#fff}th.style28{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#f90;font-family:'Arial';font-size:10pt;background-color:#fff}td.style29{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style29{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style30{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}th.style30{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}td.style31{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style31{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style32{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #843c0b !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#d6dce5}th.style32{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #843c0b !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#d6dce5}td.style33{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#d6dce5}th.style33{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:10pt;background-color:#d6dce5}td.style34{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style34{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style35{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}th.style35{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}td.style36{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #843c0b !important;border-top:2px solid #843c0b !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#d6dce5}th.style36{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #843c0b !important;border-top:2px solid #843c0b !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#d6dce5}td.style37{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style37{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style38{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}th.style38{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}td.style39{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style39{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style40{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style40{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style41{vertical-align:middle;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style41{vertical-align:middle;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style42{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}th.style42{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#1f4e79;font-family:'Arial';font-size:10pt;background-color:#fff}td.style43{vertical-align:middle;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000080;font-family:'Calibri Light';font-size:10pt;background-color:#dae3f3}th.style43{vertical-align:middle;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000080;font-family:'Calibri Light';font-size:10pt;background-color:#dae3f3}td.style44{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#dae3f3}th.style44{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#dae3f3}td.style45{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style45{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style46{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style46{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style47{vertical-align:middle;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style47{vertical-align:middle;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style48{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style48{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style49{vertical-align:middle;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style49{vertical-align:middle;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style50{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style50{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style51{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style51{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style52{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style52{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style53{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style53{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style54{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style54{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style55{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#2f5597;font-family:'Arial';font-size:10pt;background-color:#fff}th.style55{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#2f5597;font-family:'Arial';font-size:10pt;background-color:#fff}td.style56{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}th.style56{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#203864;font-family:'Arial';font-size:10pt;background-color:#fff}td.style57{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style57{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style58{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style58{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style59{vertical-align:bottom;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style59{vertical-align:bottom;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style60{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:16pt;background-color:#fff}th.style60{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:16pt;background-color:#fff}td.style61{vertical-align:bottom;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style61{vertical-align:bottom;border-bottom:none #000;border-top:1px solid #000 !important;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style62{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style62{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style63{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style63{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style64{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}th.style64{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}td.style65{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style65{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style66{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}th.style66{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}td.style67{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Century Schoolbook';font-size:11pt;background-color:#fff}th.style67{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Century Schoolbook';font-size:11pt;background-color:#fff}td.style68{vertical-align:middle;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style68{vertical-align:middle;text-align:left;padding-left:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style69{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style69{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style70{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}th.style70{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}td.style71{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}th.style71{vertical-align:bottom;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}td.style72{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style72{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:none #000;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style73{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:9pt;background-color:#fff}th.style73{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#203864;font-family:'Arial';font-size:9pt;background-color:#fff}td.style74{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style74{vertical-align:bottom;text-align:left;padding-left:0;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style75{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style75{vertical-align:bottom;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;text-decoration:underline;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style76{vertical-align:middle;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}th.style76{vertical-align:middle;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}td.style77{vertical-align:top;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-style:italic;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}th.style77{vertical-align:top;text-align:center;border-bottom:1px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:2px solid #000 !important;font-style:italic;color:#000;font-family:'Arial';font-size:8pt;background-color:#fff}td.style78{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:1px solid #000 !important;font-weight:bold;color:#000080;font-family:'Broadway';font-size:10pt;background-color:#b4c7e7}th.style78{vertical-align:bottom;text-align:center;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:2px solid #000 !important;border-right:1px solid #000 !important;font-weight:bold;color:#000080;font-family:'Broadway';font-size:10pt;background-color:#b4c7e7}td.style79{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#b4c7e7}th.style79{vertical-align:bottom;border-bottom:1px solid #000 !important;border-top:1px solid #000 !important;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#b4c7e7}td.style80{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style80{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style81{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style81{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style82{vertical-align:top;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style82{vertical-align:top;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style83{vertical-align:top;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:6pt;background-color:#fff}th.style83{vertical-align:top;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:6pt;background-color:#fff}td.style84{vertical-align:middle;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style84{vertical-align:middle;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style85{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style85{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style86{vertical-align:middle;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style86{vertical-align:middle;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style87{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}th.style87{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}td.style88{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style88{vertical-align:middle;text-align:center;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style89{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style89{vertical-align:bottom;text-align:right;padding-right:0;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style90{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style90{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}td.style91{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}th.style91{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:10pt;background-color:#fff}td.style92{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}th.style92{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:9pt;background-color:#fff}td.style93{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style93{vertical-align:middle;text-align:center;border-bottom:none #000;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style94{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style94{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:2px solid #000 !important;border-left:2px solid #000 !important;border-right:2px solid #000 !important;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style95{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#ffc000}th.style95{vertical-align:bottom;text-align:center;border-bottom:none #000;border-top:none #000;border-left:none #000;border-right:none #000;font-weight:bold;color:#000;font-family:'Arial';font-size:9pt;background-color:#ffc000}td.style96{vertical-align:middle;text-align:right;padding-right:0;border-bottom:2px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}th.style96{vertical-align:middle;text-align:right;padding-right:0;border-bottom:2px solid #000 !important;border-top:none #000;border-left:2px solid #000 !important;border-right:none #000;font-weight:bold;font-style:italic;color:#000;font-family:'Arial';font-size:12pt;background-color:#fff}td.style97{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}th.style97{vertical-align:middle;text-align:left;padding-left:0;border-bottom:2px solid #000 !important;border-top:none #000;border-left:none #000;border-right:none #000;color:#000;font-family:'Arial';font-size:11pt;background-color:#fff}td.style98{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}th.style98{vertical-align:bottom;border-bottom:2px solid #000 !important;border-top:none #000;border-left:none #000;border-right:2px solid #000 !important;color:#000;font-family:'Calibri';font-size:11pt;background-color:#fff}table.sheet0 col.col0{width:100.98888773pt}table.sheet0 col.col1{width:42pt}table.sheet0 col.col2{width:42pt}table.sheet0 col.col3{width:42pt}table.sheet0 col.col4{width:42pt}table.sheet0 col.col5{width:42pt}table.sheet0 col.col6{width:42pt}table.sheet0 col.col7{width:42pt}table.sheet0 col.col8{width:71.84444362pt}table.sheet0 tr{height:15pt}table.sheet0 tr.row0{height:15pt}table.sheet0 tr.row1{height:15.75pt}table.sheet0 tr.row2{height:16.5pt}table.sheet0 tr.row3{height:15.75pt}table.sheet0 tr.row4{height:15.75pt}table.sheet0 tr.row5{height:27pt}table.sheet0 tr.row6{height:30pt}table.sheet0 tr.row7{height:15.75pt}table.sheet0 tr.row8{height:15.75pt}table.sheet0 tr.row9{height:15.75pt}table.sheet0 tr.row10{height:15.75pt}table.sheet0 tr.row11{height:15.75pt}table.sheet0 tr.row12{height:23.25pt}table.sheet0 tr.row13{height:23.25pt}table.sheet0 tr.row14{height:15pt}table.sheet0 tr.row15{height:15pt}table.sheet0 tr.row16{height:15pt}table.sheet0 tr.row17{height:28.5pt}table.sheet0 tr.row18{height:30.75pt}table.sheet0 tr.row19{height:31.5pt}table.sheet0 tr.row20{height:30.75pt}table.sheet0 tr.row21{height:31.5pt}table.sheet0 tr.row22{height:29.25pt}table.sheet0 tr.row23{height:15pt}table.sheet0 tr.row24{height:15pt}table.sheet0 tr.row25{height:15pt}table.sheet0 tr.row26{height:15pt}table.sheet0 tr.row27{height:15pt}table.sheet0 tr.row28{height:21pt}table.sheet0 tr.row29{height:13.5pt}table.sheet0 tr.row30{height:15pt}table.sheet0 tr.row31{height:15.75pt}table.sheet0 tr.row32{height:16.5pt}table.sheet0 tr.row33{height:16.5pt}table.sheet0 tr.row34{height:16.5pt}table.sheet0 tr.row35{height:15.75pt}table.sheet0 tr.row36{height:23.25pt}table.sheet0 tr.row37{height:15pt}table.sheet0 tr.row38{height:15pt}table.sheet0 tr.row39{height:7.5pt}table.sheet0 tr.row40{height:21pt}table.sheet0 tr.row41{height:9.75pt}table.sheet0 tr.row42{height:24.75pt}table.sheet0 tr.row43{height:9pt}table.sheet0 tr.row44{height:27pt}table.sheet0 tr.row45{height:39pt}
        </style>
  </head>

  <body>
<style>
@page { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
body { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
</style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <tbody>
          <tr class="row0">
            <td class="column0 style1 null"></td>
            <td class="column1 style2 null"></td>
            <td class="column2 style2 null"></td>
            <td class="column3 style2 null"></td>
            <td class="column4 style2 null"></td>
            <td class="column5 style2 null"></td>
            <td class="column6 style2 null"></td>
            <td class="column7 style2 null"></td>
            <td class="column8 style3 null"></td>
          </tr>
          <tr class="row1">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row2">
            <td class="column0 style7 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style8 null"></td>
            <td class="column7 style9 s">N° Folio:</td>
            <td class="column8 style10 null">{{$solicitud->ID_SOL_VEH}}</td>
          </tr>
          <tr class="row3">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style11 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIA</td>
            <td class="column4 style12 s">MES</td>
            <td class="column5 style12 s">AÑO</td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style13 null"></td>
          </tr>
          <tr class="row4">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style14 s">Fecha </td>
            <td class="column3 style15 null"></td>
            <td class="column4 style15 null"></td>
            <td class="column5 style16 null"></td>
            <td class="column6 style15 null"></td>
            <td class="column7 style17 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="column8 style18 null"></td>
          </tr>
          <tr class="row5">
            <td class="column0 style19 s style19" colspan="8">SOLICITUD DE VEHICULO </td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row6">
            <td class="column0 style20 s">NOMBRE DEL SOLICITANTE</td>
            <td class="column1 style21 null style21" colspan="3">{{$solicitud->NOMBRE_SOLICITANTE}}</td>
            <td class="column4 style22 s">CARGO</td>
            <td class="column5 style21 null style21" colspan="3">{{$solicitante->cargo->CARGO}}</td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row7">
            <td class="column0 style23 null"></td>
            <td class="column1 style24 null"></td>
            <td class="column2 style24 null"></td>
            <td class="column3 style24 null"></td>
            <td class="column4 style25 null"></td>
            <td class="column5 style24 null"></td>
            <td class="column6 style24 null"></td>
            <td class="column7 style24 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row8">
            <td class="column0 style26 s">UBICACIÓN </td>
            <td class="column1 style21 null style21" colspan="3">{{$solicitante->ubicacion->UBICACION}}</td>
            <td class="column4 style25 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row9">
            <td class="column0 style27 null"></td>
            <td class="column1 style28 null"></td>
            <td class="column2 style28 null"></td>
            <td class="column3 style28 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row10">
            <td class="column0 style29 s style29" colspan="2">LABOR A REALIZAR:</td>
            <td class="column2 style30 null style30" colspan="5">{{$solicitud->MOTIVO_SOL_VEH}}</td>
            <td class="column7 style31 null"></td>
            <td class="column8 style13 null"></td>
          </tr>
          <tr class="row11">
            <td class="column0 style29 s style29" colspan="2">LUGAR DE DESTINO:</td>
            <td class="column2 style30 null style30" colspan="5">{{$comuna_destino->COMUNA}}</td>
            <td class="column7 style31 null"></td>
            <td class="column8 style13 null"></td>
          </tr>
          <tr class="row12">
            <td class="column0 style32 s">FECHA Y HORA DE SALIDA</td>
            <td class="column1 style33 null style33" colspan="6">{{$solicitud->FECHA_SALIDA}}</td>
            <td class="column7 style34 s">N° Orden de trabajo</td>
            <td class="column8 style35 null">{{$solicitud->ID_SOL_VEH}}</td>
          </tr>
          <tr class="row13">
            <td class="column0 style36 s">FECHA Y HORA DE REGRESO</td>
            <td class="column1 style33 null style33" colspan="6">{{$solicitud->FECHA_LLEGADA}}</td>
            <td class="column7 style37 null"></td>
            <td class="column8 style38 null"></td>
          </tr>
          {{-- <tr class="row14">
            <td class="column0 style39 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style40 null"></td>
            <td class="column6 style41 null"></td>
            <td class="column7 style37 null"></td>
            <td class="column8 style42 null"></td>
          </tr> --}}
          <tr class="row15">
            <td class="column0 style43 s style43" colspan="8">DATOS DE LOS OCUPANTES</td>
            <td class="column8 style44 null"></td>
          </tr>
          <tr class="row16">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style45 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style13 null"></td>
          </tr>
          <tr class="row17">
            <td class="column0 style46 s">1° OCUPANTE</td>
            <td class="column1 style47 null style47" colspan="7">
              @if ($ocupante_1)
                {{$ocupante_1->NOMBRES}} {{$ocupante_1->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style48 null"></td>
          </tr>
          <tr class="row18">
            <td class="column0 style46 s">2° OCUPANTE</td>
            <td class="column1 style49 null style49" colspan="7">
              @if ($ocupante_2)
                {{$ocupante_2->NOMBRES}} {{$ocupante_2->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style48 null"></td>
          </tr>
          <tr class="row19">
            <td class="column0 style46 s">3° OCUPANTE</td>
            <td class="column1 style49 null style49" colspan="7">
              @if ($ocupante_3)
                {{$ocupante_3->NOMBRES}} {{$ocupante_3->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style48 null"></td>
          </tr>
          <tr class="row20">
            <td class="column0 style50 s">4° OCUPANTE</td>
            <td class="column1 style49 null style49" colspan="7">
              @if ($solicitud->OCUPANTE_4)
                {{$ocupante_4->NOMBRES}} {{$ocupante_4->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style51 null"></td>
          </tr>
          <tr class="row21">
            <td class="column0 style50 s">5° OCUPANTE</td>
            <td class="column1 style49 null style49" colspan="7">
              @if ($solicitud->OCUPANTE_5)
              {{$ocupante_5->NOMBRES}} {{$ocupante_5->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style51 null"></td>
          </tr>
          <tr class="row22">
            <td class="column0 style50 s">6° OCUPANTE</td>
            <td class="column1 style49 null style49" colspan="7">
              @if ($solicitud->OCUPANTE_6)
                {{$ocupante_6->NOMBRES}} {{$ocupante_6->APELLIDOS}}
              @else
                Asiento disponible
              @endif
            </td>
            <td class="column8 style51 null"></td>
          </tr>
          <tr class="row28">
            <td class="column0 style4 null"></td>
            <td class="column1 style58 s">Firma Conductor  Asignado</td>
            <td class="column2 style59 null">{{$solicitud->FIRMA_CONDUCTOR}}</td>
            <td class="column3 style60 null"></td>
            <td class="column4 style45 null"></td>
            <td class="column5 style61 s">Firma y Timbre del Jefe que autoriza</td>
            <td class="column6 style59 null"> {{$solicitud->FIRMA_ADMINISTRADOR}}</td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row29">
            <td class="column0 style62 null style62" colspan="4"></td>
            <td class="column4 style45 null"></td>
            <td class="column5 style63 null style63" colspan="4"></td>
          </tr>
          <tr class="row30">
            <td class="column0 style64 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style31 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row31">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style65 null"></td>
            <td class="column4 style66 null style66" colspan="2"></td>
            <td class="column6 style67 null style67" colspan="2"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row32">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null">Firma y Timbre Jefe Departamento Administración</td>
            <td class="column2 style5 null">{{$solicitud->FIRMA_JEFE_ADMINISTRACION}}</td>
            <td class="column3 style5 null"></td>
            <td class="column4 style66 null"></td>
            <td class="column5 style68 s style68" colspan="4">Datos del Vehículo que se proporciona</td>
          </tr>
          <tr class="row33">
            <td class="column0 style69 null style69" colspan="4"></td>
            <td class="column4 style66 null"></td>
            <td class="column5 style70 s style70" colspan="2">PATENTE</td>
            <td class="column7 style71 s style71" colspan="2">TIPO DE VEHICULO</td>
          </tr>
          <tr class="row34">
            <td class="column0 style72 s style72" colspan="4"></td>
            <td class="column4 style66 null"></td>
            <td class="column5 style73 null style73" colspan="2">{{$solicitud->PATENTE_VEHICULO}}</td>
            <td class="column7 style73 null style73" colspan="2">{{$solicitud->tipoVehiculo->TIPO_VEHICULO}}</td>
          </tr>
          <tr class="row35">
            <td class="column0 style74 null style74" colspan="3"></td>
            <td class="column3 style75 null"></td>
            <td class="column4 style76 null style76" colspan="4"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row36">
            <td class="column0 style77 s style77" colspan="9">De conformidad a Resoluciónes N°s 8284 del 11/09/2008, 11248 del 12/12/2008, 7305 del 07/08/2009 y Oficio Circular N°10 del 10/07/2021,  se deja en la DR Concepción expresa constancia que el chofer antes individualizado, una vez cumplido su cometido llevará el vehículo asignado a su lugar de estacionamiento.</td>
          </tr>
          <tr class="row37">
            <td class="column0 style4 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style5 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row38">
            <td class="column0 style78 s style78" colspan="8">RENDICION DEL CHOFER</td>
            <td class="column8 style79 null"></td>
          </tr>
          <tr class="row39">
            <td class="column0 style53 null"></td>
            <td class="column1 style56 null style56" colspan="3"></td>
            <td class="column4 style55 null style55" colspan="4"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row40">
            <td class="column0 style80 s">Fecha y Hr de regreso:</td>
            <td class="column1 style81 null style81" colspan="2"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style37 s">ABASTECE DE BENCINA</td>
            <td class="column7 style29 null">{{$solicitud->ABS_BENCINA}}</td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row41">
            <td class="column0 style82 null"></td>
            <td class="column1 style5 null"></td>
            <td class="column2 style5 null"></td>
            <td class="column3 style5 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style37 null"></td>
            <td class="column7 style83 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row42">
            <td class="column0 style84 s">KMS. INICIAL:</td>
            <td class="column1 style85 null style85" colspan="2">{{$solicitud->KMS_INICIAL}}</td>
            <td class="column3 style86 s">KMS. FINAL</td>
            <td class="column4 style85 null style85" colspan="2">{{$solicitud->KMS_FINAL}}</td>
            <td class="column6 style87 s">&nbsp;KM. RECORRIDO</td>
            <td class="column7 style88 null">{{ $solicitud->KMS_FINAL - $solicitud->KMS_INICIAL }}</td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row43">
            <td class="column0 style89 null"></td>
            <td class="column1 style90 null"></td>
            <td class="column2 style90 null"></td>
            <td class="column3 style91 null"></td>
            <td class="column4 style5 null"></td>
            <td class="column5 style5 null"></td>
            <td class="column6 style92 null"></td>
            <td class="column7 style5 null"></td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row44">
            <td class="column0 style93 s">Tiempo Total de Hrs.</td>
            <td class="column1 style94 null style94" colspan="2"></td>
            <td class="column3 style40 s">NVL ESTANQUE</td>
            <td class="column4 style10 null">{{$solicitud->NIVEL_TANQUE}}</td>
            <td class="column5 style5 null"></td>
            <td class="column6 style95 s">Número en Bitácora</td>
            <td class="column7 style10 null">{{$solicitud->N_BITACORA}}</td>
            <td class="column8 style6 null"></td>
          </tr>
          <tr class="row45">
            <td class="column0 style96 s">Observaciones:</td>
            <td class="column1 style97 null style97" colspan="7">{{$solicitud->OBSERV_SOL_VEH}}</td>
            <td class="column8 style98 null"></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>
