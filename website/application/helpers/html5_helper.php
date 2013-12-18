<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('add_css'))
{
	function add_css($css = NULL)
	{
		if (is_null($css))
		{
			return FALSE;
		}

		if (!is_array($css))
		{
			$file_type = (preg_match('/\.css$/i', $css) ? NULL : '.css');
			$url = (!preg_match('!^\w+://! i', $css)) ? site_url('assets/css/'.$css.$file_type) : $css;
			return '<link rel="stylesheet" href="'.$url.'">'."\n";
		}
		else
		{
			$items = array();
			$i = 0;
			$tab = "\t";
			foreach ($css as $item)
			{
				if ($i == count($css) - 1)
				{
					$tab = '';
				}
				$file_type = (preg_match('/\.css$/i', $item) ? NULL : '.css');
				$url = (!preg_match('!^\w+://! i', $item)) ? site_url('assets/css/'.$item.$file_type) : $item;
				$items[] = '<link rel="stylesheet" href="'.$url.'">'."\n".$tab;
				$i++;
			}
			return implode('', $items);
		}
	}
}

if (!function_exists('add_js'))
{
	function add_js($js = NULL)
	{
		if (is_null($js))
		{
			return FALSE;
		}

		if (!is_array($js))
		{
			$file_type = (preg_match('/\.js$/i', $js) ? NULL : '.js');
			$url = (!preg_match('!^\w+://! i', $js)) ? site_url('assets/js/'.$js.$file_type) : $js;
			return '<script src="'.$url.'"></script>'."\n";
		}
		else
		{
			$items = array();
			$i = 0;
			$tab = "\t";
			foreach ($js as $item)
			{
				if ($i == count($js) - 1)
				{
					$tab = '';
				}
				$file_type = (preg_match('/\.js$/i', $item) ? NULL : '.js');
				$url = (!preg_match('!^\w+://! i', $item)) ? site_url('assets/js/'.$item.$file_type) : $item;
				$items[] = '<script src="'.$url.'"></script>'."\n".$tab;
				$i++;
			}
			return implode('', $items);
		}
	}
}

if (!function_exists('add_meta'))
{
	function add_meta($meta = NULL)
	{
		if (is_null($meta))
		{
			return FALSE;
		}
		
		$items = array();
		$i = 0;
		$tab = "\t";
		foreach ($meta as $key => $value)
		{
			if ($i == count($meta) - 1)
			{
				$tab = '';
			}

			$items[] = '<meta name="'.$key.'" content="'.$value.'">'."\n".$tab;
			$i++;
		}		
		return implode('', $items);
	}
}

if (!function_exists('shiv'))
{
	function shiv()
	{
		return '<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->'."\n";
	}
}

if (!function_exists('chrome_frame'))
{
	function chrome_frame()
	{
		return '<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><!-- Force IE to use the latest rendering engine -->'."\n";
	}
}

if (!function_exists('view_port'))
{
	function view_port()
	{
		return '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- Optimize mobile viewport -->'."\n";
	}
}

if (!function_exists('apple_mobile'))
{
	function apple_mobile($style = NULL)
	{
		if (is_null($style))
		{	
			$style = 'default';
		}

		return '<meta name="apple-mobile-web-app-capable" content="yes">'."\n\t".'<meta name="apple-mobile-web-app-status-bar-style" content="'.$style.'">'."\n";
	}
}

if (!function_exists('favicons'))
{
	function favicons($icons = NULL)
	{
		if ($icons == NULL)
		{
		return '<link rel="shortcut icon" type="image/png" href="'.site_url('assets/img/icons/favicon-16.png').'"><!-- default favicon -->'."\n\t".'<link rel="apple-touch-icon" sizes="57x57" href="'.site_url('assets/img/icons/favicon-57.png').'"><!-- iPhone low-res and Android -->'."\n\t".'<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.site_url('assets/img/icons/favicon-57.png').'"><!-- Legacy Android -->'."\n\t".'<link rel="apple-touch-icon" sizes="72x72" href="'.site_url('assets/img/icons/favicon-72.png').'"><!-- iPad -->'."\n\t".'<link rel="apple-touch-icon" sizes="114x114" href="'.site_url('assets/img/icons/favicon-114.png').'"><!-- iPhone 4 -->'."\n\t".'<link rel="apple-touch-icon" sizes="144x144" href="'.site_url('assets/img/icons/favicon-144.png').'"><!-- iPad hi-res -->'."\n";
		}
		
		if (!is_array($icons)) 
		{
			return FALSE;
		}
		
		$items = array();
		$tab = "\t";
		$i = 0;
		foreach ($icons as $size => $src)
		{
			if ($i == count($icons) - 1)
			{
				$tab = '';
			}
			switch ($size)
			{
				case '16':
					$items[] = '<link rel="shortcut icon" type="image/png" href="'.site_url($src).'"><!-- default favicon -->'."\n".$tab;
					break;
				case '57':
					$items[] = '<link rel="apple-touch-icon" sizes="57x57" href="'.site_url($src).'"><!-- iPhone low-res and Android -->'."\n".$tab;
					$items[] = '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.site_url($src).'"><!-- Legacy Android -->'."\n".$tab;
					break;
				case '72':
					$items[] = '<link rel="apple-touch-icon" sizes="72x72" href="'.site_url($src).'"><!-- iPad -->'."\n".$tab;
					break;
				case '114':
					$items[] = '<link rel="apple-touch-icon" sizes="114x114" href="'.site_url($src).'"><!-- iPhone 4 -->'."\n".$tab;
					break;
				case '144':
					$items[] = '<link rel="apple-touch-icon" sizes="144x144" href="'.site_url($src).'"><!-- iPad hi-res -->'."\n".$tab;
					break;
				default:
					$items[] = '<!--Sorry! This helper does not support the size: '.$size.'. You can add it yourself here: /applications/helpers/html5_helper -->'."\n".$tab;
					break;
			}
			$i++;
		}
		return implode('', $items);
	}
}

if (!function_exists('jquery'))
{
	function jquery($version = NULL)
	{

		if (is_null($version))
		{
			return '<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n";
		} 
		else
		{
			return '<script src="//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>'."\n";
		}
	}
}

if (!function_exists('image'))
{
	function image($src = NULL, $alt = NULL)
	{
		if (is_null($src)) 
		{
			return FALSE;
		}

		return '<img src="'.site_url($src).'" alt="'.$alt.'">'."\n";
	}
}

if (!function_exists('svg'))
{
	function svg($svg = NULL)
	{
		if (is_null($svg)) 
		{
			return FALSE;
		}

		$CI =& get_instance();
		if (!is_array($svg))
		{
			$file_type = (preg_match('/\.svg$/i', $svg) ? NULL : '.svg');
			return $CI->load->view('slices/svg/'.$svg.$file_type, '', TRUE)."\n";
		}
		else
		{
			$icons = array();
			foreach ($svg as $item)
			{
				$file_type = (preg_match('/\.svg$/i', $item) ? NULL : '.svg');
				$icons[$item] = $CI->load->view('slices/svg/'.$item.$file_type, '', TRUE)."\n";
			}
			return $icons;
		}
	}
}

/* End of file html5_helper.php */
/* Location: ./application/helpers/html5_helper.php */ 